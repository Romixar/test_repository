function deleteGET($url, $param){
        //удаление параметра GET из адр строки
        $res = $url;
        if(($p = strpos($res,"?")) !== false){//если ? есть в строке
            
            $paramstr = substr($res, $p + 1);//берем след после ? строку
            $params = explode("&", $paramstr);//разделяем её в массив по &
            $paramsarr = [];
            foreach( $params as $value ){
                $tmp = explode("=", $value);//разделяем кажд эл-т в массив по =
                $paramsarr[$tmp[0]] = $tmp[1];//сохр масссив: ключ = знач-е
                
            }
            if(array_key_exists($param, $paramsarr)){//если такой сущ-ет
                unset($paramsarr[$param]);//удаление конкр-го парам-ра
                $res = substr($res, 0 , $p + 1);//берем строку с 0 до включая ?
                foreach( $paramsarr as $key => $value ){
                    $str = $key;//снова составляем строку параметров
                    if($value !== ""){
                        $str .= "=$value";//вставляем в адр стр
                    }
                    $res .= "$str&";
                }
                $res = substr($res,0,-1);//удаление послед симв & из строки
            }
             
        }
        return $res;
    }
    
