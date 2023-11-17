<?php
$villas = [
    'Villa Ordnance' => [
        'id' => 1,
        'name' => 'Villa Ordnance',
        'slug' => 'Villa_Ordnance',
        'guests' => 8,
        'beds' => 5,
        'baths' => 4,
        'sq_foot' => 1000,
        'booking_dot_com_link' => 'https://www.booking.com/hotel/ag/villa-ordnance.html',
        'air_bnb_link' => 'https://www.airbnb.com/rooms/plus/20392292',
        'address' => "Nelson's Dockyard, St. Paul, Antigua & Barbuda",
        'address_link' => 'https://www.google.com/maps/place/Villa+Ordnance/@17.0122616,-61.7670372,18z/data=!4m9!3m8!1s0x8c12eb4233fdcaed:0xe647b8550fe6d978!5m2!4m1!1i2!8m2!3d17.0123163!4d-61.7656349!16s%2Fg%2F11t80h0r5x?entry=ttu',
        'policies' => 'Set in English Harbour Town, Villa Ordnance offers accommodation with private pool, free WiFi and free private parking for guests who drive.<br>The air-conditioned accommodation is 1.3 km from Pigeon Point Beach. Guests can make use of a garden.<br>The apartment is fitted with 4 bedrooms, 4 bathrooms, bed linen, towels, a flat-screen TV, a fully equipped kitchen, and a balcony with garden views.<br>Windward Bay Beach is 1.9 km from the apartment, while Galleon Beach is 2.2 km away. The nearest airport is V. C. Bird International Airport, 19 km from Villa Ordnance.<br>A 50% deposit is required at least one week after booking or the booking will be cancelled. The remaining 50% must be made a week before arrival or upon arrival before checking in at the villa.'
    ],
    'Casa Chiesa' => [
        'id' => 2,
        'name' => 'Casa Chiesa',
        'slug' => 'Casa_Chiesa',
        'guests' => 6,
        'beds' => 3,
        'baths' => 4,
        'sq_foot' => 1000,
        'booking_dot_com_link' => 'https://www.booking.com/hotel/ag/casa-chiesa.html',
        'air_bnb_link' => 'https://www.airbnb.com/rooms/plus/20392292',
        'address' => "Falmouth, St. Paul, Antigua & Barbuda",
        'address_link' => 'https://maps.app.goo.gl/4nyHkHmL2ZX6yygf8'
    ],
    'Little Rock Cottage' => [
        'id' => 3,
        'name' => 'Little Rock Cottage',
        'slug' => 'Little_Rock_Cottage',
        'guests' => 3,
        'beds' => 2,
        'baths' => 1,
        'sq_foot' => 1000,
        'booking_dot_com_link' => 'https://www.booking.com/hotel/ag/little-rock-cottage.html',
        'air_bnb_link' => 'https://www.airbnb.com/rooms/plus/20392292',
        'address' => "Picadilly, St. Paul, Antigua & Barbuda",
        'address_link' => 'https://www.google.com/maps/place/Little+Rock+Cottage/@17.0210881,-61.7631826,67m/data=!3m1!1e3!4m9!3m8!1s0x8c12eb1ac1758b55:0x72a3ec35a3ee6cc4!5m2!4m1!1i2!8m2!3d17.0210637!4d-61.7630725!16s%2Fg%2F11rn2bvd_8?entry=ttu'
    ],
    'Goat Hill Studio' => [
        'id' => 4,
        'name' => 'Goat Hill Studio',
        'slug' => 'Goat_Hill_Studio',
        'guests' => 2,
        'beds' => 1,
        'baths' => 1,
        'sq_foot' => 1000,
        'booking_dot_com_link' => 'https://www.booking.com/hotel/ag/goat-hill-studio.html',
        'air_bnb_link' => 'https://www.airbnb.com/rooms/plus/20392292',
        'address' => "Picadilly, St. Paul, Antigua & Barbuda",
        'address_link' => 'https://www.google.com/maps/place/Goat+cottage/@17.0211067,-61.7631886,67m/data=!3m1!1e3!4m6!3m5!1s0x8c12eb7276e6c287:0xb30472c6205b78cc!8m2!3d17.0212166!4d-61.7631333!16s%2Fg%2F11swfs0knn?entry=ttu'
    ],
    'Goat Rock Studio' => [
        'id' => 5,
        'name' => 'Goat Rock Studio',
        'slug' => 'Goat_Rock_Studio',
        'guests' => 2,
        'beds' => 1,
        'baths' => 1,
        'sq_foot' => 1000,
        'booking_dot_com_link' => 'https://www.booking.com/hotel/ag/goat-rock-studio.html',
        'air_bnb_link' => 'https://www.airbnb.com/rooms/plus/20392292',
        'address' => "Picadilly, St. Paul, Antigua & Barbuda",
        'address_link' => 'https://www.google.com/maps/place/Goat+cottage/@17.0210881,-61.7631826,67m/data=!3m1!1e3!4m6!3m5!1s0x8c12eb7276e6c287:0xb30472c6205b78cc!8m2!3d17.0212166!4d-61.7631333!16s%2Fg%2F11swfs0knn?entry=ttu'
    ]
];


$minimum_stays = [
    [
        "dates" => "15th December - 22nd April",
        "cost" => "900",
        "minimum" => 7,
        "villa_id" => 1
    ],
    [
        "dates" => "23rd April - 10th May",
        "cost" => "1000",
        "minimum" => 7,
        "villa_id" => 1
    ],
    [
        "dates" => "11th May - 14th December",
        "cost" => "750",
        "minimum" => 5,
        "villa_id" => 1
    ]
];


?>