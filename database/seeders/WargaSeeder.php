<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;
use Faker\Factory as Faker;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $agamaList     = ['islam', 'kristen', 'katolik', 'budha', 'hindu', 'konghucu'];
        $pekerjaanList = ['mahasiswa', 'guru', 'petani', 'karyawan', 'pedagang', 'pns', 'buruh'];

        foreach (range(1, 100) as $i) {

            $jenisKelamin = $faker->randomElement(['Laki-laki', 'Perempuan']);

            Warga::create([
                'no_ktp'        => $faker->numerify('################'), // 16 digit random
                'nama'          => $faker->name($jenisKelamin == 'Laki-laki' ? 'male' : 'female'),
                'jenis_kelamin' => $jenisKelamin,
                'agama'         => $faker->randomElement($agamaList),
                'pekerjaan'     => $faker->randomElement($pekerjaanList),
                'telp'          => $faker->phoneNumber(),
                'email'         => $faker->unique()->safeEmail(),
            ]);
        }

        $this->command->info("Berhasil membuat 100 data warga!");
    }
}
