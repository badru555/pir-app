<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Applicationplatform;
use App\Models\Question;
use App\Models\Respondentdepartment;
use App\Models\User;
use App\Models\Userrole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'userrole_id' => 1,
            'username' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('pa2word')
        ]);
        User::create([
            'name' => 'User',
            'userrole_id' => 2,
            'username' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('pa2word')
        ]);
        Userrole::create([
            'role' => 'Admin'
        ]);
        Userrole::create([
            'role' => 'User'
        ]);
        Respondentdepartment::create(['department' => 'Divisi Pengembangan Usaha dan Pengelolaan Anak Perusahaan']);
        Respondentdepartment::create(['department' => 'Divisi Pemasaran Strategis']);
        Respondentdepartment::create(['department' => 'Divisi Produk Digital']);
        Respondentdepartment::create(['department' => 'Divisi SBU dan Uang RI']);
        Respondentdepartment::create(['department' => 'Divisi SBU Produk Non Uang']);
        Respondentdepartment::create(['department' => 'Divisi Pengembangan Produk dan Desain']);
        Respondentdepartment::create(['department' => 'Divisi Teknik Jaminan dan Kehandalan']);
        Respondentdepartment::create(['department' => 'Divisi Pengamanan, K3 dan Lingkungan']);
        Respondentdepartment::create(['department' => 'Divisi SDM']);
        Respondentdepartment::create(['department' => 'Divisi Teknologi Informasi']);
        Respondentdepartment::create(['department' => 'PRIfA']);
        Respondentdepartment::create(['department' => 'Divisi Pengadaan dan Fasilitas Umum']);
        Respondentdepartment::create(['department' => 'Divisi Keuangan Strategis']);
        Respondentdepartment::create(['department' => 'Divisi Keuangan Operasional dan PKBL']);
        Respondentdepartment::create(['department' => 'Divisi Manajemen Risiko']);
        Respondentdepartment::create(['department' => 'Anak Perusahaan']);
        Applicationplatform::create([
            'platform' => 'WEB'
        ]);
        Applicationplatform::create([
            'platform' => 'Mobile'
        ]);
        Application::create([
            'applicationplatform_id' => '1',
            'user_id' => '1',
            'name' => 'The App',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, fugit error nulla maiores dolore quia alias magni minus quam, dolorum nam assumenda libero iusto, aspernatur ipsa quasi eius animi ipsam.',
            'link' => 'https://instagram.com',
        ]);
        Question::create(['question' => 'Aplikasi ini sangat bermanfaat untuk membantu pekerjaan saya sehari-hari']);
        Question::create(['question' => 'Aplikasi ini dapat meningkatkan kecepatan kinerja saya dalam bekerja']);
        Question::create(['question' => 'Aplikasi ini meningkatkan efektivitas saya dalam bekerja']);
        Question::create(['question' => 'Aplikasi ini mudah digunakan ']);
        Question::create(['question' => 'Aplikasi ini memiliki tampilan yang menarik']);
        Question::create(['question' => 'Aplikasi ini menyediakan fitur yang sesuai dengan kebutuhan user']);
        Question::create(['question' => 'Aplikasi ini mudah diakses']);
        Question::create(['question' => 'Saya mudah memahami fitur yang ada dalam aplikasi ini']);
        Question::create(['question' => 'Saya berharap aplikasi ini dapat selalu ada kedepannya untuk membantu pekerjaan saya sehari-hari']);
        Question::create(['question' => 'Saya lebih memilih untuk menggunakan aplikasi ini daripada menggunakan cara lama']);
    }
}
