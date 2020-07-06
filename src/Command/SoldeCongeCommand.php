<?php


namespace App\Command;


use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;




class SoldeCongeCommand extends Command
{
    protected static $defaultName = 'app:updateBDD';

    protected function configure()
    {
        $this-> setName ('Solde congé')
        -> setDescription (' afficher la solde de congé')
    -> setHelp ('cette commande imprime le solde congé');
    }
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em= $em;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $salaries =$this->em->getRepository('App\Entity\Utilisateur')->findAll();
        foreach($salaries as $salarie) {
            $solde = $salarie->getSoldeConge();
            $date1=date('Y-m-d');
            $date2=date('Y-m-01');
            if($date1==$date2){

                $solde = $solde + 1.75;
                $this->em->persist($solde);
                $this->em->flush();
            }

        }
        $output->write($salaries);
        }













      //  $Res=$this->connection->createQueryBuilder();

     //   $salaries = $Res
      //      ->select('*')
      //      ->from(Utilisateur::class, 'u')
        //   ->execute()
         //  ->fetchAll();
//$input->write($salaries);


       // foreach($salaries as $salarie){
          //  $solde = $salarie->
          //  $date1=date('Y-m-d');
          //  $date2=date('Y-m-02');
          //  if($date1==$date2){
//
//


        //  $output->write($solde);









}