    <?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CvResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'original_name' => $this->original_name,
            'file_size_kb' => round($this->file_size / 1024, 2), // Kirim dalam kilobyte
            'mime_type' => $this->mime_type,
            // Buat URL yang bisa diakses untuk men-download CV
            'download_url' => url('/api/user/cv/download/' . $this->id),
            'uploaded_at' => $this->created_at->format('d M Y, H:i'),
        ];
    }
}
