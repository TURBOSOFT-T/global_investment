<?php

namespace App\Http\Requests\Back;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Slug;
class BookUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $regex = '/^[A-Za-z0-9-éèàù]{1,50}?(,[A-Za-z0-9-éèàù]{1,50})*$/';
     //   $id = $this->book ? ',' . $this->book->id : '';

        return $rules = [
            'name' => 'nullable|max:255',
            'body' => 'nullable|max:65000',
          //  'slug' => ['required', 'max:255', new Slug, 'unique:books,slug' . $id],
            'excerpt' => 'nullable|max:50000',
            'meta_description' => 'nullable|max:50060',
            'meta_keywords' => 'nullable|regex:' . $regex,
            'seo_title' => 'nullable|max:600',
          //  'image' => 'sometimes|required|image|mimes:jpeg,png,jpg,gif',
          'image' => 'sometimes|required|file|mimetypes:image/*',

          ///  'logements' => 'required',
            'tags' => 'nullable|regex:' . $regex,
            'logement_id' => 'exists:logements,id',
        ];
    }
    
}