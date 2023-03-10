<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            padding: 5px;
            width: 100%;
        }

        .bg-secondary {
            background-color: dimgray;
            font-weight: bold;
            color: orange;
        }

        .text-bold {
            font-weight: bold;
        }

        h3 {
            font-style: italic;
        }
    </style>
</head>

<body>
    <h2>Observasi Pengawasan Manajemen Proyek</h2>
    <h3>Fase Go-Live Support: Post Go Live Support</h3>
    @php
        $level1 = 1;
        $level2 = 1;
        $level3 = 1;
    @endphp
    @foreach ($observations[0] as $obs)
        <table border="1">
            <tr class="bg-secondary">
                <td colspan="3">Resiko</td>
            </tr>
            <tr>
                <td colspan="3">GS.R1.{{ $level2++ }} {{ $obs->risk }}</td>
            </tr>
            <tr class="text-bold">
                <td>Aktivitas Kontrol</td>
                <td>Observasi</td>
                <td>Status</td>
            </tr>
            @php
                $riskactivities = App\Models\Documentobservationriskactivity::whereIn('id', explode(',', $obs->documentobservationriskactivity_ids))->get();
            @endphp
            @foreach ($riskactivities as $item)
                <tr>
                    <td>{{ 'GS.C1.' . $level3++ . ' ' . $item->activity }}</td>
                    <td>{{ $item->observation }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </table>
    @endforeach
    <div style="display: none;">NEWPAGE</div>
    <style>
        table {
            padding: 5px;
            width: 100%;
        }

        .bg-secondary {
            background-color: dimgray;
            font-weight: bold;
            color: orange;
        }

        .text-bold {
            font-weight: bold;
        }

        h3 {
            font-style: italic;
        }
    </style>
    <h2>Observasi Pengawasan Manajemen Proyek</h2>
    <h3>Fase Go-Live Support: QA Principal</h3>
    @foreach ($observations[1] as $obs)
        <table border="1">
            <tr class="bg-secondary">
                <td colspan="3">Resiko</td>
            </tr>
            <tr>
                <td colspan="3">GS.R1.{{ $level2++ }} {{ $obs->risk }}</td>
            </tr>
            <tr class="text-bold">
                <td>Aktivitas Kontrol</td>
                <td>Observasi</td>
                <td>Status</td>
            </tr>
            @php
                $riskactivities = App\Models\Documentobservationriskactivity::whereIn('id', explode(',', $obs->documentobservationriskactivity_ids))->get();
            @endphp
            @foreach ($riskactivities as $item)
                <tr>
                    <td>{{ 'GS.C1.' . $level3++ . ' ' . $item->activity }}</td>
                    <td>{{ $item->observation }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </table>
    @endforeach
    <div style="display: none;">NEWPAGE</div>
    <style>
        table {
            padding: 5px;
            width: 100%;
        }

        .bg-warning {
            background-color: orange;
            color: dimgray;
            font-weight: bold;
        }

        .text-bold {
            font-weight: bold;
        }

        h3 {
            font-style: italic;
        }
    </style>
    <h2>Daftar Resiko, Mitigasi Kontrol, dan Tindak Lanjut</h2>
    <h3>Tahap Blueprint</h3>
    <table border="1">
        <tr>
            <td class="bg-warning" style="width: 40%">
                Fase Project Preparation
            </td>
            <td style="width: 60%">
                Pada fase ini dilakukan aktivitas persiapan pelaksanaan proyek, yaitu : penyusunan tim proyek,
                pelaksanaan Kick-off meeting dan penyusunan Project Charter yang berisi penjelasan ringkas terkait ruang
                lingkup pekerjaan, jalur komunikasi, timeline, deliverables, dan struktur tim proyek.
            </td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <table border="1">
        <tr class="bg-warning">
            <td>Aktivitas Proyek</td>
            <td>Potensi Risiko</td>
            <td>Mitigasi Kontrol</td>
            <td>Status</td>
            <td>Keterangan</td>
        </tr>
        @foreach ($migitations[0] as $mig)
            @php
                $riskpotentions = explode(',', $mig->documentprojectriskactivity_ids);
                $level1 = 1;
                $level2 = 1;
                $level3 = 1;
            @endphp
            <tr>
                <td rowspan="{{ count($riskpotentions) }}">{{ $mig->project }}</td>
                @php
                    $projectactivities = App\Models\Documentprojectriskactivity::whereIn('id', $riskpotentions)->get();
                    $projectactivities_count = count($projectactivities);
                @endphp
                <td>{{ "PP.R$level1." . $level2++ . ' ' . $projectactivities[0]->risk }}</td>
                @php
                    $projectactivitymigitations = App\Models\Documentprojectriskactivitymigitation::whereIn('id', explode(',', $projectactivities[0]->documentprojectriskactivitymigitation_ids))->get();
                    $projectactivitymigitations_count = count($projectactivitymigitations);
                @endphp
                <td>
                    @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                        {{ 'PP.C1.' . $level3++ . ' ' . $projectactivitymigitations[$i]->migitation }}<br>
                    @endfor
                </td>
                <td>
                    <ol type="i">
                        @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                            <li>{{ $projectactivitymigitations[$i]->isdone != 1 ? 'Belum Selesai' : 'Selesai' }}</li>
                        @endfor
                    </ol>
                </td>
                <td>
                    <ol type="i">
                        @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                            <li>{{ $projectactivitymigitations[$i]->note }}</li>
                        @endfor
                    </ol>
                </td>
            </tr>
            @if ($projectactivities_count > 1)
                @for ($i = 1; $i < $projectactivities_count; $i++)
                    <tr>
                        <td>{{ "PP.R$level1." . $level2++ . ' ' . $projectactivities[$i]->risk }}</td>
                        @php
                            $projectactivitymigitations = App\Models\Documentprojectriskactivitymigitation::whereIn('id', explode(',', $projectactivities[$i]->documentprojectriskactivitymigitation_ids))->get();
                            $projectactivitymigitations_count = count($projectactivitymigitations);
                        @endphp
                        <td>
                            @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                {{ 'PP.C1.' . $level3++ . ' ' . $projectactivitymigitations[$i]->migitation }}<br>
                            @endfor
                        </td>
                        <td>
                            <ol type="i">
                                @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                    <li>{{ $projectactivitymigitations[$i]->isdone != 1 ? 'Belum Selesai' : 'Selesai' }}
                                    </li>
                                @endfor
                            </ol>
                        </td>
                        <td>
                            <ol type="i">
                                @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                    <li>{{ $projectactivitymigitations[$i]->note }}</li>
                                @endfor
                            </ol>
                        </td>
                    </tr>
                @endfor
            @endif
        @endforeach
    </table>
    <div style="display: none;">NEWPAGE</div>
    <style>
        table {
            padding: 5px;
            width: 100%;
        }

        .bg-warning {
            background-color: orange;
            color: dimgray;
            font-weight: bold;
        }

        .text-bold {
            font-weight: bold;
        }

        h3 {
            font-style: italic;
        }
    </style>
    <h2>Daftar Resiko, Mitigasi Kontrol, dan Tindak Lanjut</h2>
    <h3>Tahap Pengembangan/Pelaksanaan UAT</h3>
    <table border="1">
        <tr>
            <td class="bg-warning" style="width: 40%">
                Fase Realisasi
            </td>
            <td style="width: 60%">
                Pada fase ini dilakukan aktivitas konfigurasi sistem. Unit Test (UT), RICEF development, System
                Integration Test (SIT), Analisa Change Impact, Migrasi Data dan Train the Trainer (TTT).
            </td>
        </tr>
    </table>
    <div>&nbsp;</div>
    <table border="1">
        <tr class="bg-warning">
            <td>Aktivitas Proyek</td>
            <td>Potensi Risiko</td>
            <td>Mitigasi Kontrol</td>
            <td>Status</td>
            <td>Keterangan</td>
        </tr>
        @foreach ($migitations[1] as $mig)
            @php
                $riskpotentions = explode(',', $mig->documentprojectriskactivity_ids);
            @endphp
            <tr>
                <td rowspan="{{ count($riskpotentions) }}">{{ $mig->project }}</td>
                @php
                    $projectactivities = App\Models\Documentprojectriskactivity::whereIn('id', $riskpotentions)->get();
                    $projectactivities_count = count($projectactivities);
                @endphp
                <td>{{ "PP.R$level1." . $level2++ . ' ' . $projectactivities[0]->risk }}</td>
                @php
                    $projectactivitymigitations = App\Models\Documentprojectriskactivitymigitation::whereIn('id', explode(',', $projectactivities[0]->documentprojectriskactivitymigitation_ids))->get();
                    $projectactivitymigitations_count = count($projectactivitymigitations);
                @endphp
                <td>
                    @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                        {{ 'PP.C1.' . $level3++ . ' ' . $projectactivitymigitations[$i]->migitation }}<br>
                    @endfor
                </td>
                <td>
                    <ol type="i">
                        @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                            <li>{{ $projectactivitymigitations[$i]->isdone != 1 ? 'Belum Selesai' : 'Selesai' }}</li>
                        @endfor
                    </ol>
                </td>
                <td>
                    <ol type="i">
                        @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                            <li>{{ $projectactivitymigitations[$i]->note }}</li>
                        @endfor
                    </ol>
                </td>
            </tr>
            @if ($projectactivities_count > 1)
                @for ($i = 1; $i < $projectactivities_count; $i++)
                    <tr>
                        <td>{{ "PP.R$level1." . $level2++ . ' ' . $projectactivities[$i]->risk }}</td>
                        @php
                            $projectactivitymigitations = App\Models\Documentprojectriskactivitymigitation::whereIn('id', explode(',', $projectactivities[$i]->documentprojectriskactivitymigitation_ids))->get();
                            $projectactivitymigitations_count = count($projectactivitymigitations);
                        @endphp
                        <td>
                            @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                {{ 'PP.C1.' . $level3++ . ' ' . $projectactivitymigitations[$i]->migitation }}<br>
                            @endfor
                        </td>
                        <td>
                            <ol type="i">
                                @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                    <li>{{ $projectactivitymigitations[$i]->isdone != 1 ? 'Belum Selesai' : 'Selesai' }}
                                    </li>
                                @endfor
                            </ol>
                        </td>
                        <td>
                            <ol type="i">
                                @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                    <li>{{ $projectactivitymigitations[$i]->note }}</li>
                                @endfor
                            </ol>
                        </td>
                    </tr>
                @endfor
            @endif
        @endforeach
    </table>
    @if ($migitations[2])
        <div style="display: none;">NEWPAGE</div>
        <style>
            table {
                padding: 5px;
                width: 100%;
            }

            .bg-warning {
                background-color: orange;
                color: dimgray;
                font-weight: bold;
            }

            .text-bold {
                font-weight: bold;
            }

            h3 {
                font-style: italic;
            }
        </style>
        <h2>Daftar Resiko, Mitigasi Kontrol, dan Tindak Lanjut</h2>
        <h3>Tahap System Go-Live</h3>
        <table border="1">
            <tr>
                <td class="bg-warning" style="width: 40%">
                    Fase Final Preparation
                </td>
                <td style="width: 60%">
                    Pada fase ini dilakukan aktivitas pelatihan bagi para End User serta kegiatan persiapan untuk
                    pelaksanaan Go Live.
                </td>
            </tr>
        </table>
        <div>&nbsp;</div>
        <table border="1">
            <tr class="bg-warning">
                <td>Aktivitas Proyek</td>
                <td>Potensi Risiko</td>
                <td>Mitigasi Kontrol</td>
                <td>Status</td>
                <td>Keterangan</td>
            </tr>
            @foreach ($migitations[2] as $mig)
                @php
                    $riskpotentions = explode(',', $mig->documentprojectriskactivity_ids);
                @endphp
                <tr>
                    <td rowspan="{{ count($riskpotentions) }}">{{ $mig->project }}</td>
                    @php
                        $projectactivities = App\Models\Documentprojectriskactivity::whereIn('id', $riskpotentions)->get();
                        $projectactivities_count = count($projectactivities);
                    @endphp
                    <td>{{ "PP.R$level1." . $level2++ . ' ' . $projectactivities[0]->risk }}</td>
                    @php
                        $projectactivitymigitations = App\Models\Documentprojectriskactivitymigitation::whereIn('id', explode(',', $projectactivities[0]->documentprojectriskactivitymigitation_ids))->get();
                        $projectactivitymigitations_count = count($projectactivitymigitations);
                    @endphp
                    <td>
                        @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                            {{ 'PP.C1.' . $level3++ . ' ' . $projectactivitymigitations[$i]->migitation }}<br>
                        @endfor
                    </td>
                    <td>
                        <ol type="i">
                            @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                <li>{{ $projectactivitymigitations[$i]->isdone != 1 ? 'Belum Selesai' : 'Selesai' }}
                                </li>
                            @endfor
                        </ol>
                    </td>
                    <td>
                        <ol type="i">
                            @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                <li>{{ $projectactivitymigitations[$i]->note }}</li>
                            @endfor
                        </ol>
                    </td>
                </tr>
                @if ($projectactivities_count > 1)
                    @for ($i = 1; $i < $projectactivities_count; $i++)
                        <tr>
                            <td>{{ "PP.R$level1." . $level2++ . ' ' . $projectactivities[$i]->risk }}</td>
                            @php
                                $projectactivitymigitations = App\Models\Documentprojectriskactivitymigitation::whereIn('id', explode(',', $projectactivities[$i]->documentprojectriskactivitymigitation_ids))->get();
                                $projectactivitymigitations_count = count($projectactivitymigitations);
                            @endphp
                            <td>
                                @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                    {{ $projectactivitymigitations[$i]->migitation }}<br>
                                @endfor
                            </td>
                            <td>
                                <ol type="i">
                                    @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                        <li>{{ $projectactivitymigitations[$i]->isdone != 1 ? 'Belum Selesai' : 'Selesai' }}
                                        </li>
                                    @endfor
                                </ol>
                            </td>
                            <td>
                                <ol type="i">
                                    @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                        <li>{{ $projectactivitymigitations[$i]->note }}</li>
                                    @endfor
                                </ol>
                            </td>
                        </tr>
                    @endfor
                @endif
            @endforeach
        </table>
    @endif
    @if ($migitations[3])
        <div style="display: none;">NEWPAGE</div>
        <style>
            table {
                padding: 5px;
                width: 100%;
            }

            .bg-warning {
                background-color: orange;
                color: dimgray;
                font-weight: bold;
            }

            .text-bold {
                font-weight: bold;
            }

            h3 {
                font-style: italic;
            }
        </style>
        <h2>Daftar Resiko, Mitigasi Kontrol, dan Tindak Lanjut</h2>
        <h3>Tahap Post Go-Live</h3>
        <table border="1">
            <tr>
                <td class="bg-warning" style="width: 40%">
                    Fase Go Live & Support
                </td>
                <td style="width: 60%">
                    Pada fase ini dilakukan aktivitas pelaksanaan Go Live aplikasi untuk dapat digunakan End User.
                </td>
            </tr>
        </table>
        <div>&nbsp;</div>
        <table border="1">
            <tr class="bg-warning">
                <td>Aktivitas Proyek</td>
                <td>Potensi Risiko</td>
                <td>Mitigasi Kontrol</td>
                <td>Status</td>
                <td>Keterangan</td>
            </tr>
            @foreach ($migitations[3] as $mig)
                @php
                    $riskpotentions = explode(',', $mig->documentprojectriskactivity_ids);
                @endphp
                <tr>
                    <td rowspan="{{ count($riskpotentions) }}">{{ $mig->project }}</td>
                    @php
                        $projectactivities = App\Models\Documentprojectriskactivity::whereIn('id', $riskpotentions)->get();
                        $projectactivities_count = count($projectactivities);
                    @endphp
                    <td>{{ "PP.R$level1." . $level2++ . ' ' . $projectactivities[0]->risk }}</td>
                    @php
                        $projectactivitymigitations = App\Models\Documentprojectriskactivitymigitation::whereIn('id', explode(',', $projectactivities[0]->documentprojectriskactivitymigitation_ids))->get();
                        $projectactivitymigitations_count = count($projectactivitymigitations);
                    @endphp
                    <td>
                        @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                            {{ 'PP.C1.' . $level3++ . ' ' . $projectactivitymigitations[$i]->migitation }}<br>
                        @endfor
                    </td>
                    <td>
                        <ol type="i">
                            @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                <li>{{ $projectactivitymigitations[$i]->isdone != 1 ? 'Belum Selesai' : 'Selesai' }}
                                </li>
                            @endfor
                        </ol>
                    </td>
                    <td>
                        <ol type="i">
                            @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                <li>{{ $projectactivitymigitations[$i]->note }}</li>
                            @endfor
                        </ol>
                    </td>
                </tr>
                @if ($projectactivities_count > 1)
                    @for ($i = 1; $i < $projectactivities_count; $i++)
                        <tr>
                            <td>{{ "PP.R$level1." . $level2++ . ' ' . $projectactivities[$i]->risk }}</td>
                            @php
                                $projectactivitymigitations = App\Models\Documentprojectriskactivitymigitation::whereIn('id', explode(',', $projectactivities[$i]->documentprojectriskactivitymigitation_ids))->get();
                                $projectactivitymigitations_count = count($projectactivitymigitations);
                            @endphp
                            <td>
                                @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                    {{ $projectactivitymigitations[$i]->migitation }}<br>
                                @endfor
                            </td>
                            <td>
                                <ol type="i">
                                    @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                        <li>{{ $projectactivitymigitations[$i]->isdone != 1 ? 'Belum Selesai' : 'Selesai' }}
                                        </li>
                                    @endfor
                                </ol>
                            </td>
                            <td>
                                <ol type="i">
                                    @for ($i = 0; $i < $projectactivitymigitations_count; $i++)
                                        <li>{{ $projectactivitymigitations[$i]->note }}</li>
                                    @endfor
                                </ol>
                            </td>
                        </tr>
                    @endfor
                @endif
            @endforeach
        </table>
    @endif
</body>

</html>
