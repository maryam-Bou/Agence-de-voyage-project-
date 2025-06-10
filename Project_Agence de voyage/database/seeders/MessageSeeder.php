<?php

namespace Database\Seeders;

use App\Models\Message;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $messages = [
            [
                'name' => 'Maryam Bouabelli',
                'email' => 'maryam@gmail.com',
                'subject' => 'Inquiry about Bali Package',
                'message' => 'I would like to know more about the Bali vacation package. What are the included activities?',
                'is_read' => false,
            ],
            [
                'name' => 'Sawab Lahrira',
                'email' => 'sawab@gmail.com',
                'subject' => 'Group Booking Question',
                'message' => 'We are a group of 8 people interested in the Paris tour. Do you offer group discounts?',
                'is_read' => true,
            ],
            [
                'name' => 'Oumaima Ait Sidi Mohammed',
                'email' => 'oumaima@gmail.com',
                'subject' => 'Custom Tour Request',
                'message' => 'I would like to create a custom tour package for my family. Can you help with that?',
                'is_read' => false,
            ],
            [
                'name' => 'Youssef',
                'email' => 'youssef@gmail.com',
                'subject' => 'Payment Method Inquiry',
                'message' => 'What payment methods do you accept for booking tours?',
                'is_read' => true,
            ],
            [
                'name' => 'Mohammed ',
                'email' => 'mohammed@gmail.com',
                'subject' => 'Cancellation Policy',
                'message' => 'What is your cancellation policy for booked tours?',
                'is_read' => false,
            ],
        ];

        foreach ($messages as $message) {
            Message::create($message);
        }
    }
} 