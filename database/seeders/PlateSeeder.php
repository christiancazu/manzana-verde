<?php

namespace Database\Seeders;

use App\Enums\Plates;
use App\Models\Plate;
use Illuminate\Database\Seeder;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plate::create([
            'id' => 'plate-1-lunch',
            'name' => 'Lo Mein de Pollo',
            'type' => Plates::LUNCH,
            'description' => 'Delicioso plato de pasta con pollo, verduras salteadas y chía.',
            'image_url' => 'plate-1-lunch.jpg',
            'calories' => 800,
            'fats' => 6,
            'carbohydrates' => 108,
            'proteines' => 41,
            'benefits' => 'low_sodium|low_sugar|low_gluten|no_lactose|low_carbo',
            'is_favorite' => false,
            'is_recommended' => true,
        ]);

        Plate::create([
            'id' => 'plate-2-lunch',
            'name' => 'Lomo Fino',
            'type' => Plates::LUNCH,
            'description' => 'No hay nada mejor que un buen corte de carne y mejor aún, un corte argentino. Francis Mallman, indudable rey del asado, decía que el secreto para preparar cualquier platillo reside en la sencillez. Basta con obtener ingredientes de la mejor calidad: un buen bife (proveniente de esas vacas que pastan y danzan libremente por la pradera), sal de grano, chimichurri y una buena parrilla es todo lo que necesitamos para alcanzar el edén de la carne de res.',
            'image_url' => 'plate-2-lunch.jpg',
            'calories' => 900,
            'fats' => 88,
            'carbohydrates' => 156,
            'proteines' => 141,
            'benefits' => 'low_gluten|no_lactose|low_carbo',
            'is_favorite' => false,
            'is_recommended' => false,
        ]);

        Plate::create([
            'id' => 'plate-3-lunch',
            'name' => 'Pollo a la naranja',
            'type' => Plates::LUNCH,
            'description' => 'El secreto mejor guardado de toda Inglaterra para esas ocasiones especiales. El chef Gordon Ramsay nos propone una singular receta que nos transporta a una cálida y hogareña cena de Navidad al estilo británico. Empezando con caña de filete sellada, pintada con mostaza, envuelta con hongos, tomillo, prosciutto y castañas. Para finalmente abrazar a todas estas delicias con una fina capa de hojaldre. Es crocante, jugoso y delicioso, el año de espera, vale la pena.',
            'image_url' => 'plate-3-lunch.jpg',
            'calories' => 1000,
            'fats' => 19,
            'carbohydrates' => 55,
            'proteines' => 92,
            'benefits' => 'low_sodium|low_gluten|low_carbo',
            'is_favorite' => false,
            'is_recommended' => true,
        ]);

        Plate::create([
            'id' => 'plate-4-lunch',
            'name' => 'Anticucho de Corazón de Res',
            'type' => Plates::LUNCH,
            'description' => 'La gastronomía norteamericana es mucho más que hotdogs y hamburguesas. Y para demostrarlo esta el brisket (pechito de res). Este se cubre con sal de grano y pimienta negra, formando una deliciosa costra, finalmente se ahuma con leña (por más de ocho horas). El resultado final: una carne jugosa que se derrite cuando la cortas.',
            'image_url' => 'plate-4-lunch.jpg',
            'calories' => 850,
            'fats' => 65,
            'carbohydrates' => 22,
            'proteines' => 75,
            'benefits' => 'low_sugar|low_gluten|low_carbo',
            'is_favorite' => false,
            'is_recommended' => false,
        ]);

        Plate::create([
            'id' => 'plate-5-lunch',
            'name' => 'Bife de Carne Moída',
            'type' => Plates::LUNCH,
            'description' => 'Es uno de los platillos más populares de la cocina italiana. Ya que, está elaborada  en varias capas de pasta intercaladas con carne, bechamel, queso y otros ingredientes. Su origen se remonta al siglo XVII, aunque ya existían platos similares en la época clásica.',
            'image_url' => 'plate-5-lunch.jpg',
            'calories' => 700,
            'fats' => 23,
            'carbohydrates' => 168,
            'proteines' => 62,
            'benefits' => 'low_sodium|low_sugar|no_lactose',
            'is_favorite' => false,
            'is_recommended' => true,
        ]);

        // salads
        Plate::create([
            'id' => 'plate-6-salad',
            'name' => 'Ensalada poke de atún y algas con aguacate',
            'type' => Plates::SALAD,
            'description' => 'Típica entre las fiambreras más veraniegas y económicas. Sólo hay que cocer pasta o arroz y ponerle los ingredientes que te apetezcan (atún, aceitunas, maíz, mayonesa, salsa rosa, caviar, gambas, surimi…). Se toma fría, siendo mejor dejar la pasta o el arroz un poco ‘al dente’ para degustar mejor su textura firme.',
            'image_url' => 'plate-6-salad.jpg',
            'calories' => 200,
            'fats' => 11,
            'carbohydrates' => 22,
            'proteines' => 65,
            'benefits' => 'low_sodium|low_sugar|low_gluten|no_lactose|low_carbo',
            'is_favorite' => false,
            'is_recommended' => false,
        ]);

        Plate::create([
            'id' => 'plate-7-salad',
            'name' => 'Ensalada de patata o ‘kartoffelsalat’',
            'type' => Plates::SALAD,
            'description' => 'Es uno de los platos más conocidos en la cocina alemana, aunque también se consume mucho en los países del este de Europa. Entre sus ingredientes no puede faltar la patata roja, las salchichas de Frankfurt, la cebolleta, el apio, el huevo duro, el pimiento, la mayonesa y diversas especias.',
            'image_url' => 'plate-7-salad.jpg',
            'calories' => 300,
            'fats' => 22,
            'carbohydrates' => 36,
            'proteines' => 55,
            'benefits' => 'low_sugar|low_gluten|low_carbo',
            'is_favorite' => false,
            'is_recommended' => true,
        ]);

        Plate::create([
            'id' => 'plate-8-salad',
            'name' => 'Ensalada mixta',
            'type' => Plates::SALAD,
            'description' => 'No falla en los menús del día de los bares de toda España. Se prepara con lechuga, tomate y cebolla. Otras versiones más completas le añaden aceitunas, atún, huevo duro, queso y jamón. Se aliña con sal, vinagre y aceite de oliva.',
            'image_url' => 'plate-8-salad.jpg',
            'calories' => 250,
            'fats' => 18,
            'carbohydrates' => 15,
            'proteines' => 102,
            'benefits' => 'low_sugar|no_lactose',
            'is_favorite' => false,
            'is_recommended' => false,
        ]);

        Plate::create([
            'id' => 'plate-9-salad',
            'name' => 'Ensalada Caprese',
            'type' => Plates::SALAD,
            'description' => 'Desde Capri nos llega esta delicia italiana que combina el sabor suave de la mozzarella de bufala con el tomate fresco y jugoso y el aroma de las hojas de albahaca.',
            'image_url' => 'plate-9-salad.jpg',
            'calories' => 225,
            'fats' => 110,
            'carbohydrates' => 55,
            'proteines' => 18,
            'benefits' => 'low_sugar|low_gluten|low_carbo',
            'is_favorite' => false,
            'is_recommended' => true,
        ]);

        Plate::create([
            'id' => 'plate-10-salad',
            'name' => 'Ensalada Waldorf',
            'type' => Plates::SALAD,
            'description' => 'Desde Capri nos llega esta delicia italiana que combina el sabor suave de la mozzarella de bufala con el tomate fresco y jugoso y el aroma de las hojas de albahaca.',
            'image_url' => 'plate-10-salad.jpg',
            'calories' => 300,
            'fats' => 25,
            'carbohydrates' => 42,
            'proteines' => 36,
            'benefits' => 'low_sugar|low_gluten|low_carbo',
            'is_favorite' => false,
            'is_recommended' => false,
        ]);

        $plate1 = Plate::find('plate-1-lunch');
        $plate1->extras()->sync(['plate-9-salad', 'plate-10-salad']);

        $plate2 = Plate::find('plate-2-lunch');
        $plate2->extras()->sync(['plate-7-salad', 'plate-8-salad', 'plate-9-salad', 'plate-10-salad']);

        $plate3 = Plate::find('plate-3-lunch');
        $plate3->extras()->sync(['plate-8-salad']);

        $plate4 = Plate::find('plate-4-lunch');
        $plate4->extras()->sync(['plate-6-salad', 'plate-7-salad', 'plate-8-salad', 'plate-9-salad', 'plate-10-salad']);

        $plate5 = Plate::find('plate-5-lunch');
        $plate5->extras()->sync(['plate-6-salad', 'plate-8-salad', 'plate-10-salad']);
    }
}
