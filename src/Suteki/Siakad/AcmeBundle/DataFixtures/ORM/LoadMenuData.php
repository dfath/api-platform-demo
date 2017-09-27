<?php

namespace Suteki\Siakad\AcmeBundle\DataFixtures\ORM;

use Suteki\Siakad\AcmeBundle\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class LoadMenuData extends Fixture
{
    private $manager;

    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $string = file_get_contents(__DIR__.'/menu.json');
        $json = json_decode($string, true);

        foreach($json as $key => $value) {
            $this->addMenu($value);
        }
    }

    private function addMenu($menu, $parent=null){
      $objMenu = new Menu();

      $title = array_key_exists('title', $menu) ? $menu['title'] : '';
      $icon = array_key_exists('icon', $menu) ? $menu['icon'] : '';
      $path = array_key_exists('path', $menu) ? $menu['path'] : '';
      $children = array_key_exists('children', $menu) ? $menu['children'] : '';
      $active = array_key_exists('active', $menu) ? $menu['active'] : true;
      $description = array_key_exists('description', $menu) ? $menu['active'] : '';

      $objMenu->setTitle($title);
      $objMenu->setIcon($icon);
      $objMenu->setPath($path);
      $objMenu->setActive($active);
      $objMenu->setDescription($description);

      if($parent){
          $objMenu->setParent($parent);
      }

      $this->manager->persist($objMenu);
      $this->manager->flush();

      if($children){
          foreach ($children as $key => $value) {
              $this->addMenu($value, $objMenu);
          }
      }
    }
}
