<?php
/* This code adds listed people to list */
session_start();
require_once('twitteroauth/twitteroauth.php');
require_once('config.php');
$nc ="";
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, "1040091964136407042-dXbzyLI5VR9hU0ATiyhoWqbyeIkMWL", "m6LWwyt1DPKhcFfLwvvgXrG8oymjngAQPVTfdFYfRsTvP");


	 $string = $connection->post('https://api.twitter.com/1.1/lists/members/create_all.json?screen_name=khdees,JordanB20235380,therealjaygore,sammyjolacy,rickstradamus,ChristinaPonsot,BrianHartness1,cfbtrackers,residentrecon,Michaelpann1,MJMGamePro,trujilloletici1,MattSantillanes,GeorgeMadrid15,Zazusays,GrandMasterKey,HillBenjamin,IArmy1776‏,EbaSheeba,gabbyalena,Bauersocks3,blacks4liberty,TheEtherPodcast,ProximalCheese,BillwLewis20,Benjami84464887,Fatherkoyote,D0doubleD,iDeplorableVet,InfoKnight0919 ,skyKnightSky,troutinoregon,thesheepdog1776,AnnaSun77639141,anutechtechnica,Salvato62486588,AndresM02496283,ogscrappydawg,ApeR3volut1on,Big_Veggie,TrumpFollower13,mcelhaney_chris,Kelly62u,figuringoutMel,bobbytothej1,KellyRoiz,ThomasBartram1,marcevallos,tiefmesser,Calabaso1st,ChrisJ_fit,JoshuaGoldbach,daddypat1234,lindajordan38,Kylenedowdy,RoyaLwCheeze,ngmgrand,Bottom_Creek,ThomasDarnall1,edgeoftownWA,vt2424,AmericaFirst3P,2029itstarts,Jason Toebit,brian_edgin,kpclintsman,TomRyan92366606,murphybunch5&list_id=1042819968784642048');
print_r($string); 








  

?>
