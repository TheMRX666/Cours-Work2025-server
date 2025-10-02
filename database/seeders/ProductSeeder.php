<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Tom Ford',
            'Brioni',
            'Hugo Boss',
            'Valentino',
        ];

        $brandIds = [];
        foreach ($brands as $brandName) {
            $brand = Brand::create([
                'name' => $brandName,
                'slug' => Str::slug($brandName),
            ]);
            $brandIds[$brandName] = $brand->id;
        }

        $categories = [
            'Костюми' => [],
            'Взуття' => [],
            'Аксесуари' => [],
        ];

        foreach ($categories as $name => &$data) {
            $category = Category::create([
                'name' => $name,
                'slug' => Str::slug($name),
            ]);
            $data['id'] = $category->id;
        }

        $products = [
            [
                'name' => 'Tom Ford Windsor. Костюм-трійка',
                'description' => 'Костюм Tom Ford Windsor з розкішної вовни-мохеру. Крій Slim Fit, двобортний жилет. Колір: опівнічний синій.',
                'price' => 4500.00,
                'category_id' => $categories['Костюми']['id'],
                'brand_id' => $brandIds['Tom Ford'],
                'image' => 'https://placehold.co/400x600/1e293b/d4d4d4?text=TOM+FORD+WF',
            ],
            [
                'name' => 'Brioni Travel Suit, Сірий',
                'description' => 'Легендарний Brioni, створений для подорожей. 100% легка шерсть, стійка до зминання. Світло-сірий меланж.',
                'price' => 3890.00,
                'category_id' => $categories['Костюми']['id'],
                'brand_id' => $brandIds['Brioni'],
                'image' => 'https://placehold.co/400x600/374151/d1d5db?text=BRIONI+TR',
            ],
            [
                'name' => 'Hugo Boss Modern Fit, Чорний',
                'description' => 'Класичний чорний костюм для офіційних подій. Стрункий силует, ідеальна посадка. Колекція Signature.',
                'price' => 1190.00,
                'category_id' => $categories['Костюми']['id'],
                'brand_id' => $brandIds['Hugo Boss'],
                'image' => 'https://placehold.co/400x600/0f0f0f/e0e0e0?text=BOSS+BLK',
            ],
            [
                'name' => 'Valentino Slim-Cut, Бордо',
                'description' => 'Костюм із суміші вовни та шовку. Вузький крій, витончена підкладка Valentino. Колір: глибокий бордо.',
                'price' => 3100.00,
                'category_id' => $categories['Костюми']['id'],
                'brand_id' => $brandIds['Valentino'],
                'image' => 'https://placehold.co/400x600/78350f/fcd34d?text=VALENTINO',
            ],
            [
                'name' => 'Tom Ford Tuxedo, Шерсть/Шовк',
                'description' => 'Смокінг Tom Ford з атласними лацканами. Ідеальний вибір для вечірніх прийомів.',
                'price' => 5200.00,
                'category_id' => $categories['Костюми']['id'],
                'brand_id' => $brandIds['Tom Ford'],
                'image' => 'https://placehold.co/400x600/0f0f0f/fcd34d?text=SMOKING+TF',
            ],
            [
                'name' => 'Brioni Linen Blazer, Бежевий',
                'description' => 'Лляний блейзер Brioni. Ідеально підходить для літніх заходів. Ручне пошиття.',
                'price' => 2900.00,
                'category_id' => $categories['Костюми']['id'],
                'brand_id' => $brandIds['Brioni'],
                'image' => 'https://placehold.co/400x600/f3f4f6/6b7280?text=BRIONI+LINEN',
            ],
            [
                'name' => 'Hugo Boss Patterned Suit, Синій',
                'description' => 'Костюм у тонку смужку Hugo Boss. Сучасний крій, м\'яке плече.',
                'price' => 1450.00,
                'category_id' => $categories['Костюми']['id'],
                'brand_id' => $brandIds['Hugo Boss'],
                'image' => 'https://placehold.co/400x600/1f2937/9ca3af?text=BOSS+STRIPE',
            ],
            [
                'name' => 'Valentino Mohair Suit, Зелений',
                'description' => 'Оригінальний костюм з мохеру, глибокий темно-зелений колір. Для сміливих і стильних.',
                'price' => 3550.00,
                'category_id' => $categories['Костюми']['id'],
                'brand_id' => $brandIds['Valentino'],
                'image' => 'https://placehold.co/400x600/344e41/ffffff?text=VALENTINO+GR',
            ],

            [
                'name' => 'Hugo Boss Chelsea Boots',
                'description' => 'Елегантні черевики Chelsea з телячої шкіри. Класичний чорний колір, гнучка гумова підошва.',
                'price' => 590.00,
                'category_id' => $categories['Взуття']['id'],
                'brand_id' => $brandIds['Hugo Boss'],
                'image' => 'https://placehold.co/400x600/0f0f0f/e0e0e0?text=BOSS+CHELSEA',
            ],
            [
                'name' => 'Tom Ford Jago Sneakers',
                'description' => 'Розкішні шкіряні кросівки Jago. Ідеальне поєднання спортивного та класичного стилів.',
                'price' => 850.00,
                'category_id' => $categories['Взуття']['id'],
                'brand_id' => $brandIds['Tom Ford'],
                'image' => 'https://placehold.co/400x600/6b7280/ffffff?text=TOM+FORD+SNEAKERS',
            ],
            [
                'name' => 'Brioni Oxford, Black Patent',
                'description' => 'Класичні оксфорди з лакованої шкіри. Ідеально для смокінга та офіційних заходів.',
                'price' => 1100.00,
                'category_id' => $categories['Взуття']['id'],
                'brand_id' => $brandIds['Brioni'],
                'image' => 'https://placehold.co/400x600/111827/d1d5db?text=BRIONI+OXF',
            ],
            [
                'name' => 'Valentino Garavani Loafers',
                'description' => 'Замшеві лофери Valentino з фірмовою металевою пряжкою. Колір: синій.',
                'price' => 990.00,
                'category_id' => $categories['Взуття']['id'],
                'brand_id' => $brandIds['Valentino'],
                'image' => 'https://placehold.co/400x600/3b82f6/ffffff?text=VALENTINO+LF',
            ],
            [
                'name' => 'Hugo Boss Дербі, Коричневі',
                'description' => 'Елегантні туфлі Дербі з ефектом патини. Універсальна модель для ділового та повсякденного стилю.',
                'price' => 550.00,
                'category_id' => $categories['Взуття']['id'],
                'brand_id' => $brandIds['Hugo Boss'],
                'image' => 'https://placehold.co/400x600/78350f/fcd34d?text=BOSS+DERBY',
            ],
            [
                'name' => 'Tom Ford Suede Loafers, Бежеві',
                'description' => 'М\'які замшеві лофери Tom Ford з фірмовим пензликом. Комфорт та елегантність.',
                'price' => 1050.00,
                'category_id' => $categories['Взуття']['id'],
                'brand_id' => $brandIds['Tom Ford'],
                'image' => 'https://placehold.co/400x600/f3f4f6/6b7280?text=TF+LOAFERS',
            ],
            [
                'name' => 'Brioni Monk Strap, Коньяк',
                'description' => 'Черевики Monk Strap з однією пряжкою. Шкіра кольору коньяк, ручна поліровка.',
                'price' => 1250.00,
                'category_id' => $categories['Взуття']['id'],
                'brand_id' => $brandIds['Brioni'],
                'image' => 'https://placehold.co/400x600/8d624a/ffffff?text=BRIONI+MONK',
            ],
            [
                'name' => 'Valentino VLTN Sneakers',
                'description' => 'Сучасні кросівки з лого VLTN. Виготовлені в Італії, комбіновані матеріали.',
                'price' => 950.00,
                'category_id' => $categories['Взуття']['id'],
                'brand_id' => $brandIds['Valentino'],
                'image' => 'https://placehold.co/400x600/111827/d1d5db?text=VLTN+SNEAKER',
            ],

            [
                'name' => 'Valentino VLogo Краватка',
                'description' => 'Краватка з шовкового атласу з тонким жаккардовим візерунком. Колір: глибокий бордовий.',
                'price' => 195.00,
                'category_id' => $categories['Аксесуари']['id'],
                'brand_id' => $brandIds['Valentino'],
                'image' => 'https://placehold.co/400x600/78350f/fcd34d?text=VALENTINO+TIE',
            ],
            [
                'name' => 'Tom Ford Кашеміровий Шарф',
                'description' => '100% кашемір, великий розмір. Ідеальний акцент для осіннього образу.',
                'price' => 350.00,
                'category_id' => $categories['Аксесуари']['id'],
                'brand_id' => $brandIds['Tom Ford'],
                'image' => 'https://placehold.co/400x600/27272a/ffffff?text=TF+SCARF',
            ],
            [
                'name' => 'Brioni Запонки, Срібло',
                'description' => 'Елегантні запонки Brioni з гравіюванням. Срібло 925 проби.',
                'price' => 420.00,
                'category_id' => $categories['Аксесуари']['id'],
                'brand_id' => $brandIds['Brioni'],
                'image' => 'https://placehold.co/400x600/737373/ffffff?text=BRIONI+CUFF',
            ],
            [
                'name' => 'Hugo Boss Ремінь Шкіряний',
                'description' => 'Двосторонній шкіряний ремінь Hugo Boss з матовою пряжкою. Чорний/Коричневий.',
                'price' => 180.00,
                'category_id' => $categories['Аксесуари']['id'],
                'brand_id' => $brandIds['Hugo Boss'],
                'image' => 'https://placehold.co/400x600/374151/d1d5db?text=BOSS+BELT',
            ],
        ];

        foreach ($products as $productData) {
            Product::create([
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'description' => $productData['description'],
                'price' => $productData['price'],
                'category_id' => $productData['category_id'],
                'brand_id' => $productData['brand_id'],
                'image' => $productData['image'],
                'is_published' => true,
            ]);
        }
    }
}
