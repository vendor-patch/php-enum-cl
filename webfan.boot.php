<?php
/*
if (PHP_VERSION_ID < 80000) {
    require_once __DIR__ . '/../php74/BackedEnum.php';
} else {
    require_once __DIR__ . '/../php80/BackedEnum.php';
}
*/
( function($get74, $get80){   

 $phpVersion = \PHP_VERSION_ID;
 $usePolytill = $phpVersion< 80000 ? true : false;


 $classMap =  match($usePolytill){
		       true === $usePolytill    =>    $get74(),
		       false === $usePolytill    =>    $get80(),
			     default =>  $get74(),
        }

( function($classMap){   
     \frdl\implementation\psr4\RemoteAutoloaderApiClient::getInstance('https://webfan.de/install/latest/?source={{class}}&salt={{salt}}', true)       
            ->withClassmap( $classMap );
     
 } )(
  $classMap
);   
  
  
  
   } )(
  /*$get74*/
  function(){
    return [
      
      ];
  },

  /*$get80*/
  function(){
    return [
      
      ];
  }  
);   
