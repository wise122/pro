<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(KeahlianSeeder::class);
        $this->call(AbsenBtsTableSeeder::class);
        $this->call(ArsipSertifikatsTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(BtsLiveTableSeeder::class);
        $this->call(BtsPropaktanisTableSeeder::class);
        $this->call(BukusTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
        $this->call(FailedJobsTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(InstansisTableSeeder::class);
        $this->call(JadwalBtsTableSeeder::class);
        $this->call(JobsTableSeeder::class);
        $this->call(KeahliansTableSeeder::class);
        $this->call(KomoditasInvestorTableSeeder::class);
        $this->call(KomoditasKonsumenTableSeeder::class);
        $this->call(KomoditasProdusenTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(NarasumbersTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(PasswordResetTokensTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(PermissionUserTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(PesertaBtsTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(TemplateSertifikatsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(WeeklySchedulesTableSeeder::class);
    }
}
