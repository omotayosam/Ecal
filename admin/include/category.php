<?php
    $cat_id = '';
    $class_id = '';

    if (isset($_GET['cat_id'])) {
        # code...
        $cat_id = @$_GET['cat_id'];
        $cat_id = intval($cat_id);

        $cats = [
            [
                'id' => 1, 'option' => '', 'name' => 'Automobile', 'class' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item Class...'],
                    ['id' => 1.1, 'option' => '', 'name' => 'Muscle'],
                ]
            ],

            [
                'id' => 2, 'option' => '', 'name' => 'Baby Poducts', 'class' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item Class...'],
                    ['id' => 2.1, 'option' => '', 'name' => 'Apparel & Accessories'],
                    ['id' => 2.3, 'option' => '', 'name' => 'Baby & Toddler Toys'],
                    ['id' => 2.4, 'option' => '', 'name' => 'Bathing & Skin Care'],
                    ['id' => 2.5, 'option' => '', 'name' => 'Diapering'],
                    ['id' => 2.6, 'option' => '', 'name' => 'Feeding'],
                    ['id' => 2.7, 'option' => '', 'name' => 'Health & Baby Care'],
                    ['id' => 2.8, 'option' => '', 'name' => 'Pregnancy & Maternity'],
                    ['id' => 2.9, 'option' => '', 'name' => 'Strollers & Accessories'],
                ]
            ],

            [
                'id' => 3, 'option' => '', 'name' => 'Beauty N Health', 'class' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item Class...'],
                    ['id' => 3.1, 'option' => '', 'name' => 'Extension, Wigs & Accessories'],
                    ['id' => 3.2, 'option' => '', 'name' => 'Hair Accessories'],
                    ['id' => 3.3, 'option' => '', 'name' => 'Deodorants & Antipespirants'],
                    ['id' => 3.4, 'option' => '', 'name' => 'Men\'s Fragrances'],
                    ['id' => 3.5, 'option' => '', 'name' => 'Women\'s Fragrances'],
                    ['id' => 3.6, 'option' => '', 'name' => 'Makeup'],
                    ['id' => '', 'option' => 'disabled', 'name' => ''],
                    ['id' => '', 'option' => 'disabled', 'name' => 'Health'],
                    ['id' => 3.7, 'option' => '', 'name' => 'Skin Care'],
                    ['id' => 3.8, 'option' => '', 'name' => 'Medication N Treatement'],
                    ['id' => 3.9, 'option' => '', 'name' => 'Women\'s Health'],
                ]
            ],

            ['id' => 4, 'option' => '', 'name' => 'Electronics', 'class' => [['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item Class...'], ]],
            
            [
                'id' => 5, 'option' => '', 'name' => 'Fashion', 'class' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item Class...'],
                    ['id' => 5.1, 'option' => '', 'name' => 'Clothing'],
                    ['id' => 5.2, 'option' => '', 'name' => 'Footwear'],
                    ['id' => 5.3, 'option' => '', 'name' => 'Headgear'],
                    ['id' => 5.4, 'option' => '', 'name' => 'Jewellery'],
                    ['id' => 5.5, 'option' => '', 'name' => 'Wristwear'],
                ]
            ],
            
            [
                'id' => 6, 'option' => '', 'name' => 'Food N Drinks', 'class' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item Class...'],
                    ['id' => '', 'option' => 'disabled', 'name' => 'Food'],
                    ['id' => 6.1, 'option' => '', 'name' => 'Baked'],
                    ['id' => 6.2, 'option' => '', 'name' => 'Coooked'],
                    ['id' => 6.3, 'option' => '', 'name' => 'Fried'],
                    ['id' => 6.4, 'option' => '', 'name' => 'Grilled'],
                    ['id' => 6.5, 'option' => '', 'name' => 'Snacks'],
                    ['id' => '', 'option' => 'disabled', 'name' => ''],
                    ['id' => '', 'option' => 'disabled', 'name' => 'Drinks'],
                    ['id' => 6.6, 'option' => '', 'name' => 'Alchohol'],
                    ['id' => 6.7, 'option' => '', 'name' => 'Beverage'],
                    ['id' => 6.8, 'option' => '', 'name' => 'Smoothy'],
                    ['id' => 6.9, 'option' => '', 'name' => 'Soft Drink'],
                    ['id' => 6.10, 'option' => '', 'name' => 'Water'],
                    ['id' => 6.11, 'option' => '', 'name' => 'Wine N Spirit'],
                ]
            ],

            ['id' => 7, 'option' => '', 'name' => 'Grocery', 'class' => [['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item Class...'], ]],
        ];

        foreach ($cats as $cat) {
            # code...
            if ($cat['id'] == $cat_id) {
                # code...
                $classes = $cat['class'];

                foreach ($classes as $class) {
                    # code...
                    ?>
                    <option id="<?php echo $class['id']; ?>" <?php echo $class['option']; ?> value="<?php echo $class['name'];?>">
                        <?php echo $class['name']; ?>
                    </option>
                    <?php
                }
            }
        }
    }

    if (isset($_GET['class_id'])) {
        # code...
        $class_id = @$_GET['class_id'];
        $class_id = floatval($class_id);

        $classes = [
            [
                'id' => 1.1, 'option' => '', 'name' => 'Automobile', 'type' => [['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'], ]],
            ['id' => 2.1, 'option' => '', 'name' => 'Baby Poducts', 'type' => [['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'], ]],
            ['id' => 3.1, 'option' => '', 'name' => 'Beauty N Health', 'type' => [['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'], ]],
            ['id' => 4.1, 'option' => '', 'name' => 'Electronics', 'type' => [['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'], ]],

            [
                'id' => 5.1, 'option' => '', 'name' => 'Clothing', 'type' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'],
                    ['id' => 5.11, 'option' => '', 'name' => 'Clothe'],
                    ['id' => 5.12, 'option' => '', 'name' => 'Coat'],
                    ['id' => 5.11, 'option' => '', 'name' => 'Coat'],
                    ['id' => 5.13, 'option' => '', 'name' => 'Jacket'],
                    ['id' => 5.14, 'option' => '', 'name' => 'Long Sleeved T-Shirt'],
                    ['id' => 5.15, 'option' => '', 'name' => 'Short Sleeved T-Shirt'],
                    ['id' => 5.16, 'option' => '', 'name' => 'Shorts'],
                    ['id' => 5.17, 'option' => '', 'name' => 'Sweatpant'],
                    ['id' => 5.18, 'option' => '', 'name' => 'Skirt'],
                    ['id' => 5.19, 'option' => '', 'name' => 'Tracksuit'],
                    ['id' => 5.190, 'option' => '', 'name' => 'Trouser'],
                    ['id' => 5.191, 'option' => '', 'name' => 'Underclothe'],
                    ['id' => 5.192, 'option' => '', 'name' => 'Underpant'],
                ]
            ],

            [
                'id' => 5.2, 'option' => '', 'name' => 'Footwear', 'type' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'],
                    ['id' => 5.21, 'option' => '', 'name' => 'Boot'],
                    ['id' => 5.22, 'option' => '', 'name' => 'Shoe'],
                    ['id' => 5.23, 'option' => '', 'name' => 'Slipper'],
                    ['id' => 5.24, 'option' => '', 'name' => 'Trainer'],
                ]
            ],

            [
                'id' => 5.3, 'option' => '', 'name' => 'Headgear', 'type' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'],
                    ['id' => 5.31, 'option' => '', 'name' => 'Cap'],
                    ['id' => 5.32, 'option' => '', 'name' => 'Hats'],
                    ['id' => 5.33, 'option' => '', 'name' => 'Headgear'],
                    ['id' => 5.34, 'option' => '', 'name' => 'Helmet'],
                ]
            ],

            [
                'id' => 5.4, 'option' => '', 'name' => 'Jewellery', 'type' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'],
                    ['id' => 5.41, 'option' => '', 'name' => 'Earring'],
                    ['id' => 5.42, 'option' => '', 'name' => 'Fingerring'],
                    ['id' => 5.43, 'option' => '', 'name' => 'Necklace'],
                ]
            ],

            [
                'id' => 5.5, 'option' => '', 'name' => 'Wristwear', 'type' => [
                    ['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'],
                    ['id' => 5.51, 'option' => '', 'name' => 'Wristchain'],
                    ['id' => 5.52, 'option' => '', 'name' => 'Wristband'],
                    ['id' => 5.53, 'option' => '', 'name' => 'Wristwatch'],
                ]
            ],

            ['id' => 6.1, 'option' => '', 'name' => 'Food N Drinks', 'type' => [['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'], ]],
            ['id' => 7.1, 'option' => '', 'name' => 'Grocery', 'type' => [['id' => '', 'option' => 'disabled selected', 'name' => 'Select Item type...'], ]],
        ];

        foreach ($classes as $class) {
            # code...
            if ($class['id'] == $class_id) {
                # code...
                $types = $class['type'];

                foreach ($types as $type) {
                    # code...
                    ?>
                    <option id="<?php echo $type['id']; ?>" <?php echo $type['option']; ?> value="<?php echo $type['name']; ?>">
                        <?php echo $type['name']; ?>
                    </option>
                    <?php
                }
            }
        }
    }
?>