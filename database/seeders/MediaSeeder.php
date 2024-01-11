<?php

namespace Database\Seeders;

use App\Models\Estates;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();
        for ($i = 0; $i < 150; $i++) {
            $media = new Media();
            $media->model_id =  Estates::inRandomOrder()->first()->id;
            $media->model_type =  'App\Models\Estates'; // Replace 'YourModel' with your actual model
            $media->uuid =  $faker->uuid;
            $media->collection_name =  'estate_image'; // Adjust as per your collection name
            $media->name =  'istockphoto-1208205959-612x612'; // Example filename
            $media->file_name =  'istockphoto-1208205959-612x612.jpg'; // Example filename
            $media->mime_type =  'image/jpeg'; // Example mime type
            $media->disk =  'public'; // Disk name where the file is stored
            $media->conversions_disk =  'public'; // Disk name for conversions
            $media->size =  $faker->numberBetween(1000, 5000); // Example file size
            $media->manipulations =  []; // JSON field for image manipulations
            $media->custom_properties =  []; // JSON field for custom properties
            $media->generated_conversions =  []; // JSON field for generated conversions
            $media->responsive_images =  []; // JSON field for responsive images
            $media->order_column =  1; // Order column for sorting
            $media->save();
        }
    }
}
