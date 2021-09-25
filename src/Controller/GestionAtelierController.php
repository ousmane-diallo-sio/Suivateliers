<?php

namespace App\Controller;

use \PDO;
use PDOException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class GestionAtelierController extends AbstractController
{

    public function index(): Response
    {
        return $this->render('gestion_atelier/index.html.twig', [
            'controller_name' => 'GestionAtelierController',
        ]);
    }


    public function consulter(): Response{

        try{
            
            $bd = new PDO(
                            'mysql:host=localhost;dbname=sbateliers',
                            'sanayabio',
                            'azerty'
            );


            $sql = "select * from Atelier";

            $st = $bd->prepare($sql);

            $st->execute();

            $resultat = $st->fetchall();

            unset($bd);

            return $this->render('gestion_atelier/consulter.html.twig', [
                'data' => 'La page fonctionne',
                //'ateliers' => print_r($resultat),
                'ateliers' => $resultat,

            ]);

        }
        catch(PDOException $e){
            print_r($e->getMessage());
        }

    }







}
