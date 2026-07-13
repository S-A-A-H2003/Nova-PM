<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #111;
            line-height: 1.4;
            margin: 0.8in;
        }

        .header {
            margin-bottom: 18px;
            padding-bottom: 10px;
            border-bottom: 1px solid #333;
        }

        .name {
            margin: 0;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.03em;
        }

        .headline {
            margin: 6px 0 0;
            font-size: 13px;
            font-weight: 500;
            color: #444;
        }

        .contact-list {
            list-style: none;
            padding: 0;
            margin: 12px 0 0;
            color: #333;
            font-size: 10.8px;
        }

        .contact-list li {
            margin-bottom: 3px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section-title {
            margin: 0 0 10px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            border-bottom: 1px solid #ccc;
            padding-bottom: 4px;
        }

        .item {
            margin-bottom: 12px;
        }

        .item-heading {
            font-size: 12.5px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .item-meta {
            font-size: 10.5px;
            color: #555;
        }

        .item-desc {
            margin: 8px 0 0;
            font-size: 11px;
            color: #222;
            white-space: pre-wrap;
        }

        .plain-list {
            margin: 0;
            padding-left: 18px;
            color: #222;
            font-size: 11px;
        }

        .plain-list li {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1 class="name">{{ $userName }}</h1>
        @if($information?->occupation)
            <p class="headline">{{ $information->occupation }}</p>
        @endif

        <ul class="contact-list">
            @if($information?->email)
                <li>Email: {{ $information->email }}</li>
            @endif
            @if($information?->address)
                <li>Location: {{ $information->address }}</li>
            @endif
            @if($information?->gender)
                <li>Gender: {{ ucfirst($information->gender) }}</li>
            @endif
            @if($information?->date_pirth)
                <li>Date of Birth: {{ \Carbon\Carbon::parse($information->date_pirth)->format('M d, Y') }}</li>
            @endif
            @if($information?->link_one)
                <li>{{ ($information->link_one_as ? $information->link_one_as . ': ' : '') . $information->link_one }}</li>
            @endif
            @if($information?->link_two)
                <li>{{ ($information->link_two_as ? $information->link_two_as . ': ' : '') . $information->link_two }}</li>
            @endif
            @if($information?->link_three)
                <li>{{ ($information->link_three_as ? $information->link_three_as . ': ' : '') . $information->link_three }}</li>
            @endif
        </ul>
    </div>

    @php
        $summaryItems = $cvContent->where('type', 'summary');
        $skills = $cvContent->where('type', 'skills');
        $experience = $cvContent->where('type', 'professionalExperience');
        $education = $cvContent->where('type', 'education');
        $languages = $cvContent->where('type', 'languages');
        $courses = $cvContent->where('type', 'courses');
    @endphp

    @if($summaryItems->isNotEmpty())
        <div class="section">
            <div class="section-title">Summary</div>
            @foreach($summaryItems as $item)
                <p class="item-desc">{{ trim(strip_tags($item->value)) }}</p>
            @endforeach
        </div>
    @endif

    @if($skills->isNotEmpty())
        <div class="section">
            <div class="section-title">Skills</div>
            <ul class="plain-list">
                @foreach($skills as $skill)
                    <li>{{ $skill->value }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($experience->isNotEmpty())
        <div class="section">
            <div class="section-title">Professional Experience</div>
            @foreach($experience as $item)
                @php $ext = json_decode($item->extensions, true) ?: []; @endphp
                <div class="item">
                    <div class="item-heading">
                        {{ $item->value }}
                        @if(!empty($ext['professional_experience_adress']))
                            | {{ $ext['professional_experience_adress'] }}
                        @endif
                    </div>
                    <div class="item-meta">
                        @if(!empty($ext['professional_experience_start_date']))
                            {{ \Carbon\Carbon::parse($ext['professional_experience_start_date'])->format('M Y') }}
                        @endif
                        @if(!empty($ext['professional_experience_end_date']))
                            - {{ \Carbon\Carbon::parse($ext['professional_experience_end_date'])->format('M Y') }}
                        @endif
                    </div>
                    @if(!empty($ext['professional_experience_description']))
                        <div class="item-desc">{{ trim(strip_tags($ext['professional_experience_description'])) }}</div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    @if($education->isNotEmpty())
        <div class="section">
            <div class="section-title">Education</div>
            @foreach($education as $item)
                @php $ext = json_decode($item->extensions, true) ?: []; @endphp
                <div class="item">
                    <div class="item-heading">{{ $item->value }}</div>
                    <div class="item-meta">
                        {{ $ext['education_education'] ?? '' }}
                        @if(!empty($ext['education_adress']))
                            | {{ $ext['education_adress'] }}
                        @endif
                        @if(!empty($ext['education_start_date']) || !empty($ext['education_end_date']))
                            <br>
                            @if(!empty($ext['education_start_date']))
                                {{ \Carbon\Carbon::parse($ext['education_start_date'])->format('M Y') }}
                            @endif
                            @if(!empty($ext['education_end_date']))
                                - {{ \Carbon\Carbon::parse($ext['education_end_date'])->format('M Y') }}
                            @endif
                        @endif
                        @if(!empty($ext['education_gpa']))
                            <br>GPA: {{ $ext['education_gpa'] }}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if($languages->isNotEmpty())
        <div class="section">
            <div class="section-title">Languages</div>
            <ul class="plain-list">
                @foreach($languages as $item)
                    @php $ext = json_decode($item->extensions, true) ?: []; @endphp
                    <li>{{ $item->value }}{{ !empty($ext['languages_level']) ? ' — ' . $ext['languages_level'] : '' }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($courses->isNotEmpty())
        <div class="section">
            <div class="section-title">Courses</div>
            @foreach($courses as $item)
                @php $ext = json_decode($item->extensions, true) ?: []; @endphp
                <div class="item">
                    <div class="item-heading">{{ $item->value }}</div>
                    <div class="item-meta">
                        @if(!empty($ext['courses_place']))
                            {{ $ext['courses_place'] }}
                        @endif
                        @if(!empty($ext['courses_start_date']) || !empty($ext['courses_end_date']))
                            @if(!empty($ext['courses_place'])) | @endif
                            @if(!empty($ext['courses_start_date']))
                                {{ \Carbon\Carbon::parse($ext['courses_start_date'])->format('M Y') }}
                            @endif
                            @if(!empty($ext['courses_end_date']))
                                - {{ \Carbon\Carbon::parse($ext['courses_end_date'])->format('M Y') }}
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</body>
</html>
