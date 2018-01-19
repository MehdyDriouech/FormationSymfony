<?php
// src/Acme/DemoBundle/Command/GreetCommand.php
namespace AppBundle\Command;

use AppBundle\Entity\Tag;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTagCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('formation:create:tag')
            ->setDescription('créer des tag')
            ->addArgument('libelle', InputArgument::REQUIRED, 'Indiquer le tag a creer')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
      $libelle = $input->getArgument('libelle');
      $color = "#" . dechex(rand(0x000000, 0xFFFFFF));

      $tag = new Tag();
      $tag->setLibelle($libelle);
      $tag->setCouleur($color);
      $tag->setArticle(null);

      $entityManager = $this->getContainer()->get('doctrine')->getEntityManager();
      $entityManager->persist($tag);
      $entityManager->flush();

      $output->writeln("votre tag a ete creer avec les argument suivant : $libelle - $color");

    }
}
