<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Committee;

class LoadCommitteeData implements FixtureInterface
{
    public function load($manager)
    {
        $committee = new Committee();
        $committee->setName('Ponctualité');
        $committee->setDescription('Des bus respectant les horaires de passage, c\'est l\'assurance aux usagers d\'un déplacement agréable et relaxant. Bien qu\'il ne soit pas toujours facile de prévoir l\'impondérable, cette commission se démènera pour honorer les engagements de ponctualité.');
        $manager->persist($committee);
        $manager->flush();
        
        $committee = new Committee();
        $committee->setName('Accessibilité');
        $committee->setDescription('Que l\'on soit déficient visuel, âgé, en fauteuil roulant ou pas encore tout à fait familier du réseau, les sources de handicaps ne devraient jamais empêcher quiconque de solliciter nos services. Pour vous le garantir, cette commission y est très attentive.');
        $manager->persist($committee);
        $manager->flush();
        
        $committee = new Committee();
        $committee->setName('Tarification');
        $committee->setDescription('En tant que service public, notre régie s\'efforce d\'équilibrer notre gamme de la façon la plus équitable entre frais de structure et situation de chacun de nos usagers. Cette commission est toutefois à votre écoute pour répondre à vos besoins');
        $manager->persist($committee);
        $manager->flush();
    }
}
