<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute field must be accepted.',
    'accepted_if' => 'The :attribute field must be accepted when :other is :value.',
    'active_url' => 'The :attribute field must be a valid URL.',
    'after' => 'Le champs :attribute doit être une date supérieur à :date.',
    'after_or_equal' => 'Le champs :attribute doit être une date supérieur ou égal à :date.',
    'alpha' => 'The :attribute field must only contain letters.',
    'alpha_dash' => 'The :attribute field must only contain letters, numbers, dashes, and underscores.',
    'alpha_num' => 'The :attribute field must only contain letters and numbers.',
    'array' => 'Le champs :attribute doit être un tableau.',
    'ascii' => 'The :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before' => 'Le champs :attribute doit être une date inférieur à :date.',
    'before_or_equal' => 'Le champs :attribute doit être une date inférieur ou égal à :date.',
    'between' => [
        'array' => 'The :attribute field must have between :min and :max items.',
        'file' => 'The :attribute field must be between :min and :max kilobytes.',
        'numeric' => 'The :attribute field must be between :min and :max.',
        'string' => 'The :attribute field must be between :min and :max characters.',
    ],
    'boolean' => 'Le champs :attribute doit être vrai ou faux.',
    'can' => 'The :attribute field contains an unauthorized value.',
    'confirmed' => 'La confirmation du champ :attribute ne correspond pas..',
    'current_password' => 'Le mots de passe est incorrect.',
    'date' => 'Le champs :attribute doit être une date valide.',
    'date_equals' => 'The :attribute field must be a date equal to :date.',
    'date_format' => 'The :attribute field must match the format :format.',
    'decimal' => 'The :attribute field must have :decimal decimal places.',
    'declined' => 'The :attribute field must be declined.',
    'declined_if' => 'The :attribute field must be declined when :other is :value.',
    'different' => 'The :attribute field and :other must be different.',
    'digits' => 'Le champs :attribute doit être :digits chiffres.',
    'digits_between' => 'The :attribute field must be between :min and :max digits.',
    'dimensions' => 'The :attribute field has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'doesnt_end_with' => 'The :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute field must not start with one of the following: :values.',
    'email' => 'Le champs :attribute doit être une addresse mail valide.',
    'ends_with' => 'The :attribute field must end with one of the following: :values.',
    'enum' => 'Le champs :attribute est invalid.',
    'exists' => 'La valeure du champs :attribute n\'existe pas.',
    'extensions' => 'The :attribute field must have one of the following extensions: :values.',
    'file' => 'Le champs :attribute doit être un fichier.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'array' => 'The :attribute field must have more than :value items.',
        'file' => 'The :attribute field must be greater than :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than :value.',
        'string' => 'The :attribute field must be greater than :value characters.',
    ],
    'gte' => [
        'array' => 'The :attribute field must have :value items or more.',
        'file' => 'The :attribute field must be greater than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be greater than or equal to :value.',
        'string' => 'The :attribute field must be greater than or equal to :value characters.',
    ],
    'hex_color' => 'The :attribute field must be a valid hexadecimal color.',
    'image' => 'The :attribute field must be an image.',
    'in' => 'La valeure du champs :attribute est invalide.',
    'in_array' => 'The :attribute field must exist in :other.',
    'integer' => 'Le champs :attribute doit être un entier.',
    'ip' => 'The :attribute field must be a valid IP address.',
    'ipv4' => 'The :attribute field must be a valid IPv4 address.',
    'ipv6' => 'The :attribute field must be a valid IPv6 address.',
    'json' => 'The :attribute field must be a valid JSON string.',
    'lowercase' => 'The :attribute field must be lowercase.',
    'lt' => [
        'array' => 'The :attribute field must have less than :value items.',
        'file' => 'The :attribute field must be less than :value kilobytes.',
        'numeric' => 'The :attribute field must be less than :value.',
        'string' => 'The :attribute field must be less than :value characters.',
    ],
    'lte' => [
        'array' => 'The :attribute field must not have more than :value items.',
        'file' => 'The :attribute field must be less than or equal to :value kilobytes.',
        'numeric' => 'The :attribute field must be less than or equal to :value.',
        'string' => 'The :attribute field must be less than or equal to :value characters.',
    ],
    'mac_address' => 'The :attribute field must be a valid MAC address.',
    'max' => [
        'array' => 'Le champs :attribute ne doit pas être supérieur à :max éléments.',
        'file' => 'Le champs :attribute ne doit pas être supérieur à :max kilobytes.',
        'numeric' => 'Le champs :attribute ne doit pas être supérieur à :max.',
        'string' => 'Le champs :attribute ne doit pas être supérieur à :max caractères.',
    ],
    'max_digits' => 'The :attribute field must not have more than :max digits.',
    'mimes' => 'The :attribute field must be a file of type: :values.',
    'mimetypes' => 'The :attribute field must be a file of type: :values.',
    'min' => [
        'array' => 'Le champs :attribute doit être aumoins :min éléments.',
        'file' => 'Le champs :attribute doit être aumoins :min kilobytes.',
        'numeric' => 'Le champs :attribute doit être aumoins :min.',
        'string' => 'Le champs :attribute doit être aumoins :min caractères.',
    ],
    'min_digits' => 'The :attribute field must have at least :min digits.',
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => 'The :attribute field must be a multiple of :value.',
    'not_in' => 'La valeure du champs :attribute est invalide.',
    'not_regex' => 'The :attribute field format is invalid.',
    'numeric' => 'Le champs :attribute doit être un nombre.',
    'password' => [
        'letters' => 'The :attribute field must contain at least one letter.',
        'mixed' => 'The :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute field must contain at least one number.',
        'symbols' => 'The :attribute field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => 'The :attribute field must be present.',
    'present_if' => 'The :attribute field must be present when :other is :value.',
    'present_unless' => 'The :attribute field must be present unless :other is :value.',
    'present_with' => 'The :attribute field must be present when :values is present.',
    'present_with_all' => 'The :attribute field must be present when :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'The :attribute field format is invalid.',
    'required' => 'Le champs :attribute est requis.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute field must match :other.',
    'size' => [
        'array' => 'The :attribute field must contain :size items.',
        'file' => 'The :attribute field must be :size kilobytes.',
        'numeric' => 'Le champs :attribute doit être de taille :size.',
        'string' => 'Le champs :attribute doit être :size caractères.',
    ],
    'starts_with' => 'The :attribute field must start with one of the following: :values.',
    'string' => 'Le champs :attribute doit être une chaine de caractère.',
    'timezone' => 'The :attribute field must be a valid timezone.',
    'unique' => 'La valeure du champs :attribute à dejà été prise.',
    'uploaded' => 'The :attribute failed to upload.',
    'uppercase' => 'The :attribute field must be uppercase.',
    'url' => 'The :attribute field must be a valid URL.',
    'ulid' => 'The :attribute field must be a valid ULID.',
    'uuid' => 'The :attribute field must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'name' => 'nom',
        'priority_level' => 'niveau de priorité',
        'key' => 'clé',
        'value' => 'valeur',
        'affected_user' => 'utilisateur affecté',
        'incident_type_id' => 'id du type incident',
        'attachment' => 'piece jointe',
        'is_scan_constraint' => 'nom',
        'phone' => 'contact',
        'password' => 'mot de passe',
        'reason_type_id' => 'id du type de motif',
        'reason' => 'motif',
        'start_date' => 'date de debut',
        'end_date' => 'date de fin',
        'next_user' => 'interimaire',
        'level' => 'niveau',
        'abilities' => 'capacités',
        'extension_scan_image' => 'extension image de scan',
        'scan_image' => 'image de scan',
        'from' => 'de',
        'to' => 'à',
        'division_id' => 'id de la division',
        'workplace_id' => 'id du lieu de service',
        'department_id' => 'id du département',
        'lastname' => 'nom',
        'firstname' => 'prénom',
        'email' => 'adresse mail',
        'arrival_year' => 'année d\'arrivée',
        'comment' => 'commentaire',
        'district' => 'quartier',
        'profile_picture' => 'photo de profile',
        'current_password' => 'mot de passe actuel',
        'github_token' => 'token github',
        'github_token_timeout' => 'temps d\'expiration du token github',
        'git_account_name' => 'nom du compte github',
        'number_of_stars' => 'nom d\'étoiles',
        'supervisor_id' => 'id du superviseur',
    ],

];
