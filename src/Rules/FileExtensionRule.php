<?php

namespace AlgorizaTeam\MediaLibraryPro\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileExtensionRule implements Rule
{
    protected array $validExtensions = [];

    public function __construct(array $validExtensions = [])
    {
        $this->validExtensions = $validExtensions;
    }

    /**
     * @param string $attribute
     * @param \Illuminate\Http\UploadedFile $value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return in_array($value->getClientOriginalExtension(), $this->validExtensions);
    }

    public function message(): string
    {
        return trans('media-library::validation.mime', [
            'mimes' => implode(', ', $this->validExtensions),
        ]);
    }
}
