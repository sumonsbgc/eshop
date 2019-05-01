<?php
use App\Category;

// $categories = Category::pluck('name');


$categories = [
    'all_categories' => 'All categories',
    'jewelry' => 'Jewelry',
    'entertainment' => 'Entertainment',
    'mobile' => 'Mobile',
    'kids' => 'Kids',
    'toys' => 'Toys',
    'men' => 'Men',
    'women' => 'Women',
    'sports' => 'Sports',
    'electronic_devices' => 'Electronic devices',
    'jute_craft' => 'Jute craft',
    'necklace_st' => 'Necklace st',
    'earrings' => 'Earrings',
    'rings' => 'Rings',
    'anklet' => 'Anklet',
    'locket_pen_dust' => 'Locket pen dust',
    'fair_sticks' => 'Fair sticks',
    'bracelet' => 'Bracelet',
    'bras_less' => 'Bras less',
    'nose_pin' => 'Nose pin',
    'jewelry_box' => 'Jewelry box',
    'stone_jewelry' => 'Stone jewelry',
    'bicycle' => 'Bicycle',
    'inflatable_sofa' => 'Inflatable sofa',
    'inflatable_chair' => 'Inflatable chair',
    'bathtub' => 'Bathtub',
    'samsung' => 'Samsung',
    'huwaei' => 'Huwaei',
    'xiaomi' => 'Xiaomi',
    'meiju' => 'Meiju',
    'vivo' => 'Vivo',
    'oppo' => 'Oppo',
    'boys' => 'Boys',
    'girls' => 'Girls',
    'electronics_toys' => 'Electronics toys',
    'manual_toys' => 'Manual toys',
    'educational_toys' => 'Educational toys',
    'belt' => 'Belt',
    'wallet' => 'Wallet',
    'shirt' => 'Shirt',
    't-shirt' => 'T-shirt',
    'shoes' => 'Shoes',
    'bag' => 'Bag',
    'jewelry' => 'Jewelry',
    'mobile' => 'Mobile',
    'football' => 'Football',
    'swimming_glass' => 'Swimming glass',
    'swimming_cap' => 'Swimming cap',
    'skating' => 'Skating',
    'sp_others' => 'Others',
    'w_vanity_bag' => 'Vanity bag',
    'purse' => 'Purse',
    'shari' => 'Shari',
    'three_piece' => 'Three piece',
    'two_piece' => 'Two piece',
    'one_piece' => 'One piece',
    'jamdani' => 'Jamdani',
    'hand_sties' => 'Hand sties',
    'tv' => 'TV',
    'oven' => 'Oven',
    'freeze' => 'Freeze',
    'computer' => 'Computer',
    'iron' => 'Iron',
    'air_driver' => 'Air driver',
    'shaver' => 'Shaver',
    'el_others' => 'Others',
    'j_vanity_bag' => 'Vanity bag',
    'travel_bag' => 'Travel bag',
    'shopping_bag' => 'Shopping bag',
    'carrying_bag' => 'Carrying bag',
    'floor_mat' => 'Floor mat',
    'table_mat' => 'Table mat',
    'dining_table_runner' => 'Dining table runner',
    'pen_holder' => 'Pen holder',
    'tissue_box' => 'Tissue box',
    'ornament_box' => 'Ornament box',
    'busket' => 'busket',
    'show_piece' => 'Show piece',
];


$cats = [];
foreach($categories as $key => $cat){
     $cats[strtolower($key)] = $cat;
}

return $cats;