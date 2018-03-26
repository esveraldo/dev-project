<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(GroupTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(OfferTableSeeder::class);
        $this->call(ListTableSeeder::class);
        $this->call(ListaUserTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        $this->call(TextTableSeeder::class);
        $this->call(OfferStoreTableSeeder::class);
        $this->call(UserStoreTableSeeder::class);
        $this->call(BannerTableSeeder::class);
        $this->call(ListaProductTableSeeder::class);
        $this->call(ProductGroupTableSeeder::class);
        $this->call(ProductTagTableSeeder::class);
        $this->call(ProductStoreTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(TransactionTypeTableSeeder::class);
        $this->call(TransactionTableSeeder::class);
        $this->call(LoyaltyTableSeeder::class);
        $this->call(OfferUserTableSeeder::class);
        $this->call(CampaignsTableSeeder::class);
        $this->call(MessagingTableSeeder::class);
        $this->call(OfferCampaignsTableSeeder::class);
        $this->call(EncartesTableSeeder::class);
        $this->call(EncarteStoreTableSeeder::class);
        $this->call(RaffleTableSeeder::class);

        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(AdminRoleTableSeeder::class);
    }
}
