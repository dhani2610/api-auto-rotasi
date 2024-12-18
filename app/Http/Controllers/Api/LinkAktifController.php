<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rotator;

class LinkAktifController extends Controller
{
    public function updateLinkAktif(Rotator $rotator)
    {
        // Daftar link dan status terkait
        $links = [
            'link_1' => 'link_1_status',
            'link_2' => 'link_2_status',
            'link_3' => 'link_3_status',
            'link_4' => 'link_4_status',
            'link_5' => 'link_5_status',
            'link_6' => 'link_6_status',
            'link_7' => 'link_7_status',
            'link_8' => 'link_8_status',
            'link_9' => 'link_9_status',
            'link_10' => 'link_10_status',
        ];

        // Cari kunci link_aktif saat ini
        $currentKey = array_search($rotator->link_aktif, array_column($links, 0)) ?: 'link_1';
        $currentIndex = array_search($currentKey, array_keys($links));

        // Loop untuk menemukan link berikutnya yang statusnya "Ada"
        $nextLink = null;
        for ($i = 0; $i < count($links); $i++) {
            $linkKey = array_keys($links)[($currentIndex + $i) % count($links)];
            $statusKey = $links[$linkKey];

            if ($rotator->$statusKey === 'Ada') {
                $nextLink = $rotator->$linkKey;
                break;
            }
        }

        // Jika ditemukan link berikutnya, update `link_aktif`
        if ($nextLink) {
            $rotator->update(['link_aktif' => $nextLink]);
        }

        return response()->json([
            'message' => 'Link aktif updated successfully',
            'link_aktif' => $rotator->link_aktif,
        ]);
    }
}
