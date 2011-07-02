<?php

namespace HomoDemocraticoSapiens\ComplaintManagerBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use HomoDemocraticoSapiens\ComplaintManagerBundle\Entity\Committee;

class LoadCommitteeData implements FixtureInterface
{
    public function load($manager)
    {
        $ponctualite = new Committee();
        $ponctualite->setName('Ponctualité');
        $ponctualite->setDescription('Des bus respectant les horaires de passage, c\'est l\'assurance aux usagers d\'un déplacement agréable et relaxant. Bien qu\'il ne soit pas toujours facile de prévoir l\'impondérable, cette commission se démènera pour honorer nos engagements de ponctualité.');
        $manager->persist($ponctualite);
        $manager->flush();
        
        $accessibilite = new Committee();
        $accessibilite->setName('Accessibilité');
        $accessibilite->setDescription('Que l\'on soit déficient visuel, âgé, en fauteuil roulant ou pas encore tout à fait familier du réseau, les sources de handicaps ne devraient jamais empêcher quiconque de solliciter nos services. Pour vous le garantir, cette commission y est très attentive.');
        $manager->persist($accessibilite);
        $manager->flush();
        
        $tarification = new Committee();
        $tarification->setName('Tarification');
        $tarification->setDescription('En tant que service public, notre régie s\'efforce d\'équilibrer notre gamme de la façon la plus équitable entre frais de structure et situation de chacun de nos usagers. Cette commission est toutefois à votre écoute pour répondre à vos besoins.');
        $manager->persist($tarification);
        $manager->flush();
        
        $bus = new Committee();
        $bus->setName('Flotte de bus');
        $bus->setDescription('Nos véhicules sont le vecteur de vos voyages. Sont-ils suffisament propres ? sécurisés ? confortables ? Vos remarques à ce sujet nous sont précieuses.');
        $manager->persist($bus);
        $manager->flush();
    }
}
