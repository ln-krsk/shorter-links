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

    'accepted' => ':attribute muss akzeptiert werden.',
    'accepted_if' => 'The :attribute field must be accepted when :other is :value.',
    'active_url' => ':attribute muss eine gültige URL sein.',
    'after' => ':attribute muss ein Datum nach dem :date sein.',
    'after_or_equal' => ':attribute muss ein Datum nach dem oder am :date sein.',
    'alpha' => ':attribute darf nur Buchstaben enthalten.',
    'alpha_dash' => ':attribute darf nur Buchstaben, Zahlen und Bindestriche enthalten.',
    'alpha_num' => ':attribute darf nur Buchstaben und Zahlen enthalten.',
    'array' => ':attribute muss eine Liste sein.',
    'ascii' => 'The :attribute field must only contain single-byte alphanumeric characters and symbols.',
    'before' => ':attribute muss ein Datum vor dem :date sein.',
    'before_or_equal' => ':attribute muss ein Datum vor dem oder am :date sein.',
    'between' => [
        'numeric' => ':attribute muss zwischen :min und :max sein.',
        'file' => ':attribute muss zwischen :min und :max Kilobytes sein.',
        'string' => ':attribute muss zwischen :min und :max Zeichen sein.',
        'array' => ':attribute muss zwischen :min und :max Einträge haben.',
    ],
    'boolean' => ':attribute muss wahr oder falsch sein.',

    'can' => 'The :attribute field contains an unauthorized value.',
    'confirmed' => 'Die :attribute-Bestätigung stimmt nicht überein.',
    'current_password' => 'The password is incorrect.',
    'date' => ':attribute ist kein gültiges Datum.',
    'date_equals' => 'The :attribute field must be a date equal to :date.',
    'date_format' => ':attribute entspricht nicht dem Format: :format.',
    'decimal' => 'The :attribute field must have :decimal decimal places.',
    'declined' => 'The :attribute field must be declined.',
    'declined_if' => 'The :attribute field must be declined when :other is :value.',
    'different' => ':attribute und :other müssen verschieden sein.',
    'digits' => ':attribute muss :digits Ziffern lang sein.',
    'digits_between' => ':attribute muss zwischen :min und :max Ziffern lang sein.',
    'dimensions' => ':attribute hat inkorrekte Bild-Dimensionen.',
    'distinct' => ':attribute hat einen doppelten Wert.',
    'doesnt_end_with' => 'The :attribute field must not end with one of the following: :values.',
    'doesnt_start_with' => 'The :attribute field must not start with one of the following: :values.',
    'email' => ':attribute muss eine korrekte E-Mail-Adresse sein.',
    'ends_with' => 'The :attribute field must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'Ausgewählte(s) :attribute ist inkorrekt.',
    'extensions' => 'The :attribute field must have one of the following extensions: :values.',
    'file' => ':attribute muss eine Datei sein.',
    'filled' => ':attribute muss ausgefüllt werden.',
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
    'image' => ':attribute muss ein Bild sein.',
    'in' => 'Ausgewählte(s) :attribute ist inkorrekt.',
    'in_array' => ':attribute existiert nicht in :other.',
    'integer' => ':attribute muss eine Ganzzahl sein.',
    'ip' => ':attribute muss eine korrekte IP-Adresse sein.',
    'ipv4' => ':attribute muss eine korrekte IPv4-Adresse sein.',
    'ipv6' => ':attribute muss eine korrekte IPv6-Adresse sein.',
    'json' => ':attribute muss ein korrekter JSON-String sein.',
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
        'array' => ':attribute darf nicht mehr als :max Einträge enthalten.',
        'file' => ':attribute darf nicht größer als :max Kilobytes sein.',
        'numeric' => ':attribute darf nicht größer als :max sein.',
        'string' => ':attribute darf nicht länger als :max Zeichen sein.',
    ],
    'max_digits' => 'The :attribute field must not have more than :max digits.',
    'mimes' => ':attribute muss eine Datei in folgendem Format sein: :values.',
    'mimetypes' => ':attribute muss eine Datei in folgendem Format sein: :values.',
    'min' => [
        'array' => ':attribute muss mindestens :min Einträge haben..',
        'file' => ':attribute muss mindestens :min Kilobytes groß; sein.',
        'numeric' => ':attribute muss mindestens :min sein.',
        'string' => ':attribute muss mindestens :min Zeichen lang sein.',
    ],
    'min_digits' => 'The :attribute field must have at least :min digits.',
    'missing' => 'The :attribute field must be missing.',
    'missing_if' => 'The :attribute field must be missing when :other is :value.',
    'missing_unless' => 'The :attribute field must be missing unless :other is :value.',
    'missing_with' => 'The :attribute field must be missing when :values is present.',
    'missing_with_all' => 'The :attribute field must be missing when :values are present.',
    'multiple_of' => 'The :attribute field must be a multiple of :value.',
    'not_in' => 'Ausgewählte(s) :attribute ist inkorrekt.',
    'not_regex' => 'The :attribute field format is invalid.',
    'numeric' => ':attribute muss eine Zahl sein.',
    'password' => [
        'letters' => 'The :attribute field must contain at least one letter.',
        'mixed' => 'The :attribute field must contain at least one uppercase and one lowercase letter.',
        'numbers' => 'The :attribute field must contain at least one number.',
        'symbols' => 'The :attribute field must contain at least one symbol.',
        'uncompromised' => 'The given :attribute has appeared in a data leak. Please choose a different :attribute.',
    ],
    'present' => ':attribute muss vorhanden sein.',
    'present_if' => 'The :attribute field must be present when :other is :value.',
    'present_unless' => 'The :attribute field must be present unless :other is :value.',
    'present_with' => 'The :attribute field must be present when :values is present.',
    'present_with_all' => 'The :attribute field must be present when :values are present.',
    'prohibited' => 'The :attribute field is prohibited.',
    'prohibited_if' => 'The :attribute field is prohibited when :other is :value.',
    'prohibited_unless' => 'The :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'The :attribute field prohibits :other from being present.',
    'regex' => 'Das :attribute-Format ist inkorrekt.',
    'required' => ':attribute field wird benötigt.',
    'required_array_keys' => 'The :attribute field must contain entries for: :values.',
    'required_if' => ':attribute field wird benötigt wenn :other einen Wert von :value hat.',
    'required_if_accepted' => 'The :attribute field is required when :other is accepted.',
    'required_unless' => ':attribute field wird benötigt außer :other ist in den Werten :values enthalten.',
    'required_with' => ':attribute field wird benötigt wenn :values vorhanden ist.',
    'required_with_all' => ':attribute field wird benötigt wenn :values vorhanden ist.',
    'required_without' => ':attribute field wird benötigt wenn :values nicht vorhanden ist.',
    'required_without_all' => ':attribute field wird benötigt wenn keine der Werte :values vorhanden ist.',
    'same' => ':attribute und :other müssen gleich sein.',
    'size' => [
        'array' => ':attribute muss :size Einträge enthalten.',
        'file' => ':attribute muss :size Kilobytes groß; sein.',
        'numeric' => ':attribute muss :size groß sein.',
        'string' => ':attribute muss :size Zeichen lang sein.',
    ],
    'starts_with' => 'The :attribute field must start with one of the following: :values.',
    'string' => ':attribute muss Text sein.',
    'timezone' => ':attribute muss eine korrekte Zeitzone sein.',
    'unique' => ':attribute wurde bereits verwendet.',
    'uploaded' => 'Der Upload von :attribute schlug fehl.',
    'uppercase' => 'The :attribute field must be uppercase.',
    'url' => 'Das :attribute-Format ist inkorrekt.',
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
        'data.URL' => ['active_url' => 'Der Ziel-Link muss eine gültige URL sein.'],
        'data.utm_source' => [
            'required_with' => 'utm_source und utm_medium sind für die Nutzung von Google-Tracking erforderlich.',
        ],
        'data.utm_medium' => [
            'required_with' => 'utm_source und utm_medium sind für die Nutzung von Google-Tracking erforderlich.',
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
        'email' => 'E-Mail Adresse',
        'password' => 'Passwort',
        'password_confirmation' => 'Passwort-Bestätigung',
        'remember' => 'Zugangsdaten merken',
        'name' => 'Name',
    ],
];
