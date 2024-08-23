<?php

namespace App\Charts;
use App\Models\Risk;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class RiskChart1
{
    protected $chart;
    protected $chart1;

    public function __construct(LarapexChart $chart, LarapexChart $chart2, LarapexChart $chart3)
    {
        $this->chart = $chart;
        $this->chart3 = $chart3;
        $this->chart2 = $chart2;

    }

    public function build()
    {
        // Mendapatkan data dari database
        $risks = Risk::select('kategori_risiko', \DB::raw('count(*) as count'))
                    ->groupBy('kategori_risiko')
                    ->get();

        // Jika tidak ada data yang ditemukan
        if ($risks->isEmpty()) {
            // Menampilkan pesan atau grafik default
            return $this->chart->pieChart()
                            ->setTitle('Profil Risiko')
                            ->setSubtitle('Data not found for Profil Risiko')
                            ->addData([1]) // Menambahkan data fiktif untuk mewujudkan grafik
                            ->setLabels(['No Data'])
                            ->setColors(['#DDDDDD']); // Warna abu-abu untuk grafik default
        }

        // Mendefinisikan warna untuk setiap Profil Risiko
        $colors = [
            'operational' => '#14A3C7',       // Hijau
            'hazard' => '#50C878',    // Kuning
            'finance' => '#FFA600',      // Merah
            'strategy&planning' => '#8F0B0B'    // Merah Tua
        ];
        
        // Menginisialisasi label dan data dari hasil query
        $labels = [];
        $data = [];

        // Mengisi label dan data dengan hasil query
        foreach ($risks as $risk) {
            $labels[] = ucfirst($risk->kategori_risiko);
            $data[] = $risk->count;
        }

        // Mengatur urutan warna sesuai dengan urutan label
        $colors = array_intersect_key($colors, array_flip(array_map('strtolower', $labels)));

        return $this->chart->pieChart()
                        ->setTitle('Profil Risiko')
                        ->addData($data)
                        ->setLabels($labels)
                        ->setColors(array_values($colors));
    }


    public function build2()
    {
        // Mendapatkan data dari database
        $risks = Risk::select('tingkat_risiko', \DB::raw('count(*) as count'))
                    ->groupBy('tingkat_risiko')
                    ->get();

        // Jika tidak ada data yang ditemukan
        if ($risks->isEmpty()) {
            // Menampilkan pesan atau grafik default
            return $this->chart->pieChart()
                            ->setTitle('Tingkat Risiko')
                            ->setSubtitle('Data not found for Tingkat Risiko')
                            ->addData([1]) // Menambahkan data fiktif untuk mewujudkan grafik
                            ->setLabels(['No Data'])
                            ->setColors(['#DDDDDD']); // Warna abu-abu untuk grafik default
        }

        // Mendefinisikan warna untuk setiap tingkat risiko
        $colors = [
            'Extreme' => '#660000',
            'High' => '#C11B17',   
            'Medium' => '#FDD017',    
            'Low' => '#00FF00'
        ];

        // Menginisialisasi label dan data dari hasil query
        $labels = [];
        $data = [];

        // Mengisi label dan data dengan hasil query
        foreach ($risks as $risk) {
            $labels[] = $risk->tingkat_risiko;
            $data[] = $risk->count;
        }

        // Mengatur urutan warna sesuai dengan urutan label
        $colors = array_intersect_key($colors, array_flip($labels));

        return $this->chart->pieChart()
                        ->setTitle('Tingkat Risiko')
                        ->addData($data)
                        ->setLabels($labels)
                        ->setColors(array_values($colors));
    }



    public function build3()
    {
        // Mendapatkan data dari database
        $risks = Risk::select('strategi', \DB::raw('count(*) as count'))
                        ->groupBy('strategi')
                        ->get();

        // Jika tidak ada data yang ditemukan
        if ($risks->isEmpty()) {
        // Menampilkan pesan atau grafik default
        return $this->chart->pieChart()
                    ->setTitle('Strategi')
                    ->setSubtitle('Data not found for Strategi')
                    ->addData([1]) // Menambahkan data fiktif untuk mewujudkan grafik
                    ->setLabels(['No Data'])
                    ->setColors(['#DDDDDD']); // Warna abu-abu untuk grafik default
        }

        // Menginisialisasi label dan data dari hasil query
        $labels = [];
        $data = [];

        // Mengisi label dan data dengan hasil query
        foreach ($risks as $risk) {
            $label = $risk->strategi ? ucfirst($risk->strategi) : 'Null';
            $labels[] = $label;
            $data[] = $risk->count;
        }

        return $this->chart->pieChart()
                ->setTitle('Strategi')
                ->addData($data)
                ->setLabels($labels);
    }
}
