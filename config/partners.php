<?php

// Sibling side-project family that cross-promotes across each other's sites.
// Each project's own /partners page lists this same list minus itself (see 'key').
//
// CANONICAL SHARED SPEC — this exact array is copy-pasted into each sibling repo's
// own config/partners.php. They are independent deployments: editing this file does
// NOT propagate anywhere else. Keep the 7 entries and their keys identical across repos.
return [
    [
        'key' => 'json-into-toon',
        'name' => 'JSON into TOON',
        'emoji' => '🔁',
        'url' => 'https://json-into-toon.site/',
        'description' => 'Free online JSON ↔ TOON converter plus a full suite of JSON tools — formatter, minifier, CSV/XML/YAML/SQL/TypeScript converters, and a JSON diff checker.',
    ],
    [
        'key' => '5ehptracker',
        'name' => '5e HP Tracker',
        'emoji' => '🎲',
        'url' => 'https://5ehptracker.online/',
        'description' => 'Free D&D 5e hit point calculator supporting every class and level, with Constitution modifiers, multiclass builds, feats, and racial bonuses.',
    ],
    [
        'key' => 'aghslahore',
        'name' => 'AGHS Lahore',
        'emoji' => '🏫',
        'url' => 'https://aghslahore.pk/',
        'description' => 'Al-Falah Grammar High School & Academy — official school portal for results, roll-number slips, notices, and e-books.',
    ],
    [
        'key' => 'bpmtaptempo',
        'name' => 'BPM Tap Tempo Tool',
        'emoji' => '🎵',
        'url' => 'https://bpmtaptempo.online/',
        'description' => 'Tap or click in rhythm with a beat to instantly measure its tempo in BPM — built for musicians, producers, and anyone timing music or motion.',
    ],
    [
        'key' => 'petcure',
        'name' => 'PetCure (PawMeds AI)',
        'emoji' => '🐾',
        'url' => 'https://petcure.app/',
        'description' => 'Pet medication and wellness tracking app with AI-generated, vet-ready health summaries for dose adherence, symptoms, and daily care.',
    ],
    [
        'key' => 'educalchub',
        'name' => 'Edu Calculator Hub',
        'emoji' => '🎓',
        'url' => 'https://edu-calculator-hub.online/',
        'description' => 'Free education calculators — GPA, admission-merit, scholarship finder and study-abroad planning tools for students.',
    ],
    [
        'key' => 'bechly',
        'name' => 'Bechly.pk',
        'emoji' => '🛒',
        'url' => 'https://bechly.pk/',
        'description' => 'Pakistan ka Bazaar — an online classifieds marketplace to buy and sell anything across Pakistan, fast and free.',
    ],
];
