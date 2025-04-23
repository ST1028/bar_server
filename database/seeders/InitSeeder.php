<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class InitSeeder extends Seeder
{
    const Admins = [
        ['name' => '管理者', 'account' => 'admin3737'],
    ];

    const Users = [
        ['name' => 'ジェイ', 'account' => 'j1028'],
        ['name' => 'スタッフ1', 'account' => 'staff0001'],
        ['name' => 'スタッフ2', 'account' => 'staff0002'],
        ['name' => 'スタッフ3', 'account' => 'staff0003'],
        ['name' => 'スタッフ4', 'account' => 'staff0004'],
        ['name' => 'スタッフ5', 'account' => 'staff0005'],
    ];

    const MenuCategories = [
        ['id' => 1, 'name' => 'ビール', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/beer.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 2],
        ['id' => 2, 'name' => 'ワイン', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/wine.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 3],
        ['id' => 3, 'name' => 'ウィスキー', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/whiskey.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 4],
        ['id' => 4, 'name' => '日本酒', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/sake.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 5],
        ['id' => 5, 'name' => '果実酒', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/fruit-alcohol.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 6],
        ['id' => 6, 'name' => 'ビールカクテル', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/beer-cocktail.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 8],
        ['id' => 7, 'name' => 'カクテル', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/cocktail.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 7],
        ['id' => 8, 'name' => 'ノンアル', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/non-alcohol.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 10],
        ['id' => 9, 'name' => 'ソフトドリンク', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/softdrink.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 11],
        ['id' => 10, 'name' => 'ワインカクテル', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/wine-cocktail.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 9],
        ['id' => 11, 'name' => '期間限定', 'thumbnail' => 'https://bar-file.s3.ap-northeast-1.amazonaws.com/limited.png', 'default_menu_thumbnail' => '', 'is_active' => true, 'order' => 1],
    ];

    const Menus = [
        ['name' => 'ビール', 'menu_category_id' => 1, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => '世界のビール', 'menu_category_id' => 1, 'price' => 450, 'recipe' => '', 'description' => ''],
        ['name' => 'シャンディーガフ', 'menu_category_id' => 6, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'コークビア', 'menu_category_id' => 6, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カシスビア', 'menu_category_id' => 6, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ビターオレンジ', 'menu_category_id' => 6, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ピーチビア', 'menu_category_id' => 6, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カシス', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カシスオレンジ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カシスウーロン', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カシスジンジャー', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カシスグレフル', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カシスソーダ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ピーチ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ファジーネーブル(オレンジ)', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ピーチウーロン', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ピーチジンジャー', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ピーチグレフル', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ライチ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ライチオレンジ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ライチグレフル', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ライチソーダ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ライチコーラ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ジン', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ジンバック', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ジンソーダ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ジングレフル', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ウォッカ', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'スクリュードライバー(オレンジ)', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ブルドック(グレフル)', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'モスコミュール(ジンジャー✖️ライム)', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ラム', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ラムコーク', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => '濃厚梅酒', 'menu_category_id' => 5, 'price' => 300, 'recipe' => '', 'description' => '', 'blend_ids' => [1, 2, 3]],
        ['name' => '黒糖梅酒', 'menu_category_id' => 5, 'price' => 300, 'recipe' => '', 'description' => '', 'blend_ids' => [1, 2, 3]],
        ['name' => 'マスカット酒', 'menu_category_id' => 5, 'price' => 300, 'recipe' => '', 'description' => '', 'blend_ids' => [1, 2, 3]],
        ['name' => '白桃酒', 'menu_category_id' => 5, 'price' => 300, 'recipe' => '', 'description' => '', 'blend_ids' => [1, 2, 3]],
        ['name' => 'マンゴー酒', 'menu_category_id' => 5, 'price' => 300, 'recipe' => '', 'description' => '', 'blend_ids' => [1, 2, 3]],
        ['name' => '美酢パイン', 'menu_category_id' => 8, 'price' => 250, 'recipe' => '', 'description' => '', 'blend_ids' => [2, 3]],
        ['name' => '美酢ピーチ', 'menu_category_id' => 8, 'price' => 250, 'recipe' => '', 'description' => '', 'blend_ids' => [2, 3]],
        ['name' => '美酢みかん', 'menu_category_id' => 8, 'price' => 250, 'recipe' => '', 'description' => '', 'blend_ids' => [2, 3]],
        ['name' => '美酢カラマンシー', 'menu_category_id' => 8, 'price' => 250, 'recipe' => '', 'description' => '', 'blend_ids' => [2, 3]],
        ['name' => '美酢マスカット', 'menu_category_id' => 8, 'price' => 250, 'recipe' => '', 'description' => '', 'blend_ids' => [2, 3]],
        ['name' => 'オレンジ', 'menu_category_id' => 9, 'price' => 150, 'recipe' => '', 'description' => ''],
        ['name' => 'パイン', 'menu_category_id' => 9, 'price' => 150, 'recipe' => '', 'description' => ''],
        ['name' => 'グレフル', 'menu_category_id' => 9, 'price' => 150, 'recipe' => '', 'description' => ''],
        ['name' => 'ジンジャーエール', 'menu_category_id' => 9, 'price' => 150, 'recipe' => '', 'description' => ''],
        ['name' => 'コーラ', 'menu_category_id' => 9, 'price' => 150, 'recipe' => '', 'description' => ''],
        ['name' => '烏龍茶', 'menu_category_id' => 9, 'price' => 150, 'recipe' => '', 'description' => ''],
        ['name' => 'ソーダ', 'menu_category_id' => 9, 'price' => 150, 'recipe' => '', 'description' => ''],
        ['name' => '赤ワイン', 'menu_category_id' => 2, 'price' => 250, 'recipe' => '', 'description' => ''],
        ['name' => '白ワイン', 'menu_category_id' => 2, 'price' => 250, 'recipe' => '', 'description' => ''],
        ['name' => 'キティ', 'menu_category_id' => 10, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カリモーチョ', 'menu_category_id' => 10, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'カーディナル', 'menu_category_id' => 10, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'アメリカンレモネード', 'menu_category_id' => 10, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ミモザ', 'menu_category_id' => 10, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'キール', 'menu_category_id' => 10, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'オペレーター', 'menu_category_id' => 10, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'スプリッツァー', 'menu_category_id' => 10, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'グレープバイン(グレフル✖️レモン✖️グレナデン)', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ディタエイジア(レモン✖️烏龍茶)', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => 'ジンフィズ(レモン✖️シュガー✖️ソーダ)', 'menu_category_id' => 7, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => '¥250メニュー', 'menu_category_id' => 11, 'price' => 250, 'recipe' => '', 'description' => ''],
        ['name' => '¥300メニュー', 'menu_category_id' => 11, 'price' => 300, 'recipe' => '', 'description' => ''],
        ['name' => '¥350メニュー', 'menu_category_id' => 11, 'price' => 350, 'recipe' => '', 'description' => ''],
        ['name' => '¥400メニュー', 'menu_category_id' => 11, 'price' => 400, 'recipe' => '', 'description' => ''],
        ['name' => 'ハイボール', 'menu_category_id' => 3, 'price' => 300, 'recipe' => '', 'description' => '']
    ];

    const Blends = [
        ['id' => 1, 'name' => 'ロック'],
        ['id' => 2, 'name' => 'ソーダ'],
        ['id' => 3, 'name' => '水'],
        ['id' => 4, 'name' => 'ストレート'],
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('migrate:fresh');

        foreach (self::Admins as $admin) {
            Admin::factory()->create([
                'account' => $admin['account'],
                'name' => $admin['name'],
            ]);
        }

        foreach (self::Users as $user) {
            User::factory()->create([
                'name'    => $user['name'],
                'account' => $user['account'],
            ]);
        }

        foreach (self::Blends as $blend) {
            \App\Models\Blend::factory()->create([
                'id' => $blend['id'],
                'name' => $blend['name'],
            ]);
        }

        foreach (self::MenuCategories as $menuCategory) {
            \App\Models\MenuCategory::factory()->create([
                'id' => $menuCategory['id'],
                'name' => $menuCategory['name'],
                'thumbnail' => $menuCategory['thumbnail'],
                'default_menu_thumbnail' => $menuCategory['default_menu_thumbnail'],
                'order' => $menuCategory['order'],
                'is_active' => $menuCategory['is_active']
            ]);
        }

        foreach (self::Menus as $menu) {
            $modelMenu = \App\Models\Menu::factory()->create([
                'name' => $menu['name'],
                'menu_category_id' => $menu['menu_category_id'],
                'price' => $menu['price'],
                'recipe' => $menu['recipe'],
                'thumbnail' => null,
                'description' => $menu['description'],
                'is_active' => true
            ]);

            if (isset($menu['blend_ids'])) {
                $modelMenu->blends()->attach($menu['blend_ids']);
            }
        }
    }
}
