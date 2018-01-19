<?php

namespace AppBundle\Command;

use AppBundle\Entity\Tag;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateTagsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('formation:create:tag')
            ->setDescription('Permet de créer un tag')
            ->addArgument('libelle', InputArgument::REQUIRED, 'Quel tag voulez-vous créer ?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $libelle = $input->getArgument('libelle');
        $color = "#" . dechex(rand(0x000000, 0xFFFFFF));

        $tag = new Tag();
        $tag->setCouleur($color);
        $tag->setLibelle($libelle);

        /** @var EntityManager $em */
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $em->persist($tag);
        $em->flush();

        $output->writeln("Tag créer avec succès : $libelle - $color");
    }
}