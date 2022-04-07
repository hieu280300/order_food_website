<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::pluck('id')->toArray();
        $listProductNames = [
            'TRÀ CAM VÀNG',
            'CAM VÀNG CHANH ĐÁ XAY',
            'TRÀ BƯỞI MẬT ONG',
            'TRÀ LÀI MACCHIATO',
            'BẠC SỈU',
            'CÀ PHÊ ĐEN',
            'TRÀ LÀI MACCHIATO',
            'TRÀ CHERRY MACCHIATO',
            'TRÀ ĐÀO CAM SẢ',
            'TRÀ BƯỞI MẬT ONG',
            'TRÀ LÀI MACCHIATO',
            'CHANH SẢ ĐÁ XAY',
            'CHOCOLATE ĐÁ XAY',
            'COOKIES ĐÁ XAY',
            'ĐÀO VIỆT QUẤT ĐÁ XAY',
            'SINH TỐ CAM XOÀI',
            'SINH TỐ VIỆT QUẤT',
            'TRÀ BƯỞI MẬT ONG',
            'TRÀ LÀI MACCHIATO',
            'BÁNH BÔNG LAN TRỨNG MUỐI',
            'BÁNH CHOCOLATE',
            'BÁNH CROISSANT BƠ TỎI',
            'BÁNH GẤU CHOCOLATE',
            
        ];
        $listProductSlugs = [
            'TRA_CAM_VANG',
            'CAM_VANG_CHANH_DA',
            'TRA_BUOI_MAT_ONG',
            'TRA_LAI_MACCHIATO',
            'BAC_SIU',
            'CA_PHE_DEN',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',
            'TRA_LAI_MACCHIATO',


            
        ];
        $listProductDescriptions = [
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
            'Bạc sỉu chính là "Ly sữa trắng kèm một chút cà phê". Thức uống này rất phù hợp những ai vừa muốn trải nghiệm chút vị đắng của cà phê vừa muốn thưởng thức vị ngọt béo ngậy từ sữa.',
        ];
        $listProductThumbnails = [
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/cam_vang_da_xay.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
            "product/thumbnails/tra_cam_vang.png",
        ];
        $quantities = [5, 10, 15, 20, 50, 100, 200];
        $money = [10000,20000,30000,40000];
        foreach( $categories as $categoryId){
            $product = [
                'name' =>$listProductNames[array_rand($listProductNames)],
                'description' =>$listProductDescriptions[array_rand($listProductDescriptions)],
                'quantity' => $quantities[array_rand($quantities)],
                'money' => $money[array_rand($money)],
                'content'=>$listProductDescriptions[array_rand($listProductDescriptions)],
                'code' => Str::random(5),
                'slug' => $listProductSlugs[array_rand($listProductSlugs)],
                'thumbnail' => $listProductThumbnails[array_rand($listProductThumbnails)],
                'is_feature' => 1,
                'shop_id' =>1,
                'category_id' => $categoryId, 
            ];
            Product::create($product);
        }
      
    }
}
