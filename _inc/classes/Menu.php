<?php

class Menu
{
    // Premenná pre uloženie položiek menu
    private $menuItems;

    // Konštruktor, ktorý umožňuje nastaviť položky menu pri vytváraní objektu
    public function __construct($menuItems = [])
    {
        // Ak sú položky menu prázdne, nastavíme predvolené položky
        if (empty($menuItems)) {
            $menuItems = [
                ['label' => 'Home', 'link' => 'index.php'],
                ['label' => 'Careers', 'link' => 'careers.php'],
                ['label' => 'Gallery', 'link' => 'gallery.php'],
                ['label' => 'Contact', 'link' => 'contact.php'],
                ['label' => 'About', 'link' => 'about.php']
            ];
        }
        
        // Uloženie položiek menu
        $this->menuItems = $menuItems;
    }
    
    // Metóda index() na získanie položiek menu
    public function index()
    {
        return $this->menuItems;
    }
}
?>
