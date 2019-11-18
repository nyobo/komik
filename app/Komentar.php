<?php
    namespace App;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Database\Eloquent\Model;
    use DB;
    use Illuminate\Http\Request;
    class Komentar extends Model
    {
        protected $guarded = ['id'];
        protected $table = "komentar";
        protected $fillable = [
            'komentar',
            'child',
            'like',
            'id_komik_detail',
            'id_user',
            'komentar_name',
        ];
        public static function getDataById($id){
            //defaul array
            $komentar =Komentar::where('id','=',$id)->get()->last();
            return $komentar;
        }
        public static function getKomentarPopulareByIdKomikDetail($idKomikDetail)
        {
            $komentar = Komentar::where('id_komik_detail','=',$idKomikDetail)->limit(4)->orderBy('like','desc')->get();
            return $komentar;
        }
        public static function countKomentarByIdKomikDetail($id){
            $komentar = Komentar::where('id_komik_detail','=',$id)->get()->count();
            return $komentar;
        }
        public static function getKomentarByIdKomikDetail($id,$order,$page,Request $request){
            $sorder = '';
            if ($order == 1) {
                $orderUnLike = 'unlike';
                $orderBaseKom = 'basekom';
                $orderUpdatedAt = 'updated_at';
                // $sorder = 'ORDER BY '.$orderBaseKom.' DESC ,'.$orderLike.' DESC';
                $sorder = 'ORDER BY '.$orderBaseKom.' DESC ,'.$orderUnLike.' ASC , '.$orderUpdatedAt.' DESC ';
            } else if($order == 2) {
                $orderCreate = 'created_at';
                $sorder = 'ORDER BY '.$orderCreate.' DESC';
            
            }else if($order == 4){
                $orderId = 'id';
                $sorder = 'ORDER BY '.$orderId.' ASC';
            }else{
                $orderjmlKom ='jml_komentar_detail';
                $sorder = 'ORDER BY '.$orderjmlKom.' DESC';

            }
            // !lama lama yang menggunakan like di dalam koemtntar 
            // $komentar = DB::select("select bk.*,count(kd.id) as jml_komentar_detail from (select a.*,(if(t.id,true,false))as basekom from (select * from komentar ) as a LEFT join  (select id from komentar WHERE id_komik_detail = $id ORDER BY komentar.like DESC LIMIT 4 ) as t on a.id = t.id) as bk left join komentar_detail kd on bk.id = kd.id_komentar  WHERE bk.id_komik_detail = $id  GROUP BY bk.id $sorder");
            // !ini ysng baru digunakan untuk pemisahan table lnd like and dislike
            $komentarQuery = 
                "SELECT * FROM (
                    SELECT ksem.*,IF(
                        jml_kom.jml,jml_kom.jml,0) as jml_komentar_detail 
                    FROM (
                            SELECT k.id,k.komentar,k.id_komik_detail,k.id_user,k.komentar_name,k.created_at,k.updated_at,lndnbase.like,lndnbase.dislike as unlike,lndnbase.base as basekom 
                            FROM komentar k 
                            LEFT JOIN 
                            ( 
                                SELECT jlndk.* ,if(basekom.id , true, false) as base 
                                FROM 
                                    (
                                        SELECT k.id, IF(lnd.action = 1,COUNT(lnd.id),0) as `like`,IF(lnd.action = 2,COUNT(lnd.id),0) as `dislike`
                                        FROM komentar k
                                        LEFT JOIN lnd_komentar lnd 
                                        ON k.id = lnd.id_komentar 
                                        WHERE k.id_komik_detail = $id group by 1 
                                    ) as jlndk
                                    LEFT JOIN 
                                    (
                                        SELECT k.id, IF(lnd.action = 1,COUNT(lnd.id),0) as `like`, IF(lnd.action = 2,COUNT(lnd.id),0) as `dislike`
                                        FROM komentar k 
                                        LEFT JOIN lnd_komentar lnd 
                                        ON k.id = lnd.id_komentar 
                                        WHERE k.id_komik_detail = $id group by 1
                                        ORDER by `like` DESC LIMIT 4
                                    ) as basekom 
                                ON jlndk.id = basekom.id
                            ) as lndnbase 
                            ON k.id = lndnbase.id 
                        ) as ksem
                        LEFT JOIN 
                        (
                            SELECT k.id,COUNT(kd.id) as jml FROM komentar_detail kd 
                            INNER JOIN komentar k 
                            ON kd.id_komentar = k.id
                            WHERE k.id_komik_detail = $id group by 1
                        ) as jml_kom
                    ON ksem.id = jml_kom.id
                    WHERE id_komik_detail = $id
                )as ends 
                $sorder ";
            $komentar = DB::select($komentarQuery);
            $total = count($komentar);
            $perPage = 10;
            $offset = ($page * $perPage) - $perPage;
            $currentPage = $page;
            $options = 
                [
                    'path' => $request->url(),
                    'query' => $request->query()
                ];
            $paginator = new LengthAwarePaginator(array_slice($komentar,$offset,$perPage,false), $total, $perPage,$currentPage,$options);
            return $paginator;
        }
    }




    // ??? sampah
     //     $komentar = DB::select(DB::raw("SELECT bk.*,count(kd.id) as jumlah_komentar_detail from 
        //     (select a.*,(if(t.id,true,false)) as basekom from (select * from komentar ) as a 
        // LEFT join (select id from komentar WHERE id_komik_detail = $id ORDER BY 'like' 'desc' limit 4) as t on a.id = t.id) as bk 
        // LEFT join komentar_detail kd on bk.id = kd.id_komentar 
        // WHERE bk.id_komik_detail = $id 
        // GROUP by bk.id  ORDER by bk.$order DESC"));

            // $coba = select('komentar.*',DB::raw('count(komentar_detail.id) as jml_komentar_detail'))
            // ->leftJoin(DB::raw('(select id from komentar where id_komik_detail ='+$id+' Order by "like" desc limit 4) as t'),'komentar.id','=',t.id)
            // ->leftJoin('komentar_detail','komentar.id','=','komentar_detail.id_komentar')
            // ->groupBy('komentar.id')
            // ->where('id_komik_detail','=',$id)
            // ->orderBy($order,'desc')
            // ->paginate(3,['*'],'page',$page)->toArray();