@php
   
    $prescriptionId = Auth::user()->prescriptions->first()->id ?? null;
@endphp


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">{{ __('Arzt Dashboard') }}</div>
                <div class="card-body">
                    @if (Auth::check())  {{-- Check if user is logged in --}}
                        <p class="lead">{{ __('Welcome, :name!', ['name' => Auth::user()->name]) }}</p>
                    <div class="list-group mb-4">
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="{{ route('prescriptions.create') }}">
                                Neues Rezept anlegen
                                <span class="badge badge-primary badge-pill">+</span>
                            </a>
                            <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" href="{{ route('patients.create') }}">
                                Neuen Patienten anlegen
                                <span class="badge badge-primary badge-pill">+</span>
                            </a>
                            <ul class="list-group">
                            @if($prescriptionId)
                                <li><a class="list-group-item list-group-item-action" href="{{ route('prescriptions.show', ['id' => $prescriptionId]) }}">Rezepte scannen</a></li>
                            @endif
                            </ul>
                            <a class="list-group-item list-group-item-action" href="{{ route('prescriptions.index') }}">Alle Rezepte anzeigen</a>
                            </li>
                            <li class="list-group-item list-group-item-action">
                            <a class="nav-link" href="{{ route('patients.index') }}">Alle Patienten anzeigen</a>
                            </li>

                           @endif
                    <div class="mb-4">
                        <a href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); 
                           document.getElementById('logout-form').submit();"
                           class="btn btn-danger">{{ __('Logout') }}</a>
                           <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


 
<!--
krankenkasseIHK@gmail.com
IHK123456789
#############
Dr.ursula@gmail.com
ursula123456
############
ApothekeJanssen@gmail.com
janssen123456789


Die Möglichkeit, Daten direkt mit dem behandelnden Arzt eines Patienten zu teilen, kann mehrere wichtige Vorteile haben, sowohl für die Patienten als auch für die medizinischen Fachkräfte. Hier sind einige wesentliche Vorteile dieser Funktion:

1. Verbesserte Kommunikation zwischen Arzt und Patient
Die direkte Datenübermittlung kann die Kommunikation zwischen Patienten und Ärzten erleichtern. Ärzte erhalten regelmäßige Updates über den Gesundheitszustand ihrer Patienten, ohne dass diese für jedes kleine Anliegen einen Termin vereinbaren müssen. Dies kann besonders nützlich sein für chronisch kranke Patienten, die eine kontinuierliche Überwachung benötigen.

2. Früherkennung von Gesundheitsproblemen
Mit regelmäßigen Datenupdates kann der Arzt Trends erkennen, die auf entstehende Gesundheitsprobleme hinweisen könnten, bevor sie ernster werden. Zum Beispiel könnte eine Veränderung in der Aktivität oder Medikamentenadhärenz auf Probleme hinweisen, die weitere Untersuchungen erfordern.

3. Angepasste Behandlungspläne
Die laufende Überwachung von Gesundheitsdaten ermöglicht es Ärzten, Behandlungspläne schneller anzupassen, basierend auf den neuesten Informationen über den Gesundheitszustand des Patienten. Wenn zum Beispiel die Aktivitätsdaten zeigen, dass ein Patient weniger aktiv ist, könnte der Arzt empfehlen, die Medikation oder die Therapie anzupassen.

4. Erhöhte Patientenverantwortung
Wenn Patienten wissen, dass ihre Gesundheitsdaten direkt an ihren Arzt gesendet werden, könnten sie motivierter sein, sich an Behandlungspläne zu halten und gesünder zu leben. Das Gefühl der Verantwortlichkeit kann eine wichtige Rolle bei der Verbesserung der Gesundheitsergebnisse spielen.

5. Effizienzsteigerung in der medizinischen Versorgung
Durch die Automatisierung der Datenübermittlung können sowohl die Zeit als auch die Ressourcen, die für die manuelle Dateneingabe und -überprüfung benötigt werden, reduziert werden. Dies führt zu einer effizienteren medizinischen Praxis und kann helfen, Kosten zu senken.

6. Unterstützung für telemedizinische Dienste
In einem Zeitalter, in dem Telemedizin immer mehr an Bedeutung gewinnt, bietet die direkte Übermittlung von Gesundheitsdaten eine solide Basis für virtuelle Arztbesuche. Ärzte können sich vor einem Telemedizin-Termin auf dem neuesten Stand bringen und das Gespräch effizienter gestalten.

Technische und rechtliche Überlegungen
Es ist wichtig, die Implementierung einer solchen Funktion sorgfältig zu planen, um die Einhaltung aller relevanten Datenschutzbestimmungen sicherzustellen. Hierzu gehört die Verwendung sicherer Übertragungsmethoden und die Gewährleistung, dass Patienten ihre Einwilligung zur Datenübermittlung gegeben haben. Datenschutz und -sicherheit sind hierbei oberste Priorität, um das Vertrauen der Benutzer zu gewinnen und rechtliche Konsequenzen zu vermeiden.

Durch die Integration dieser Funktion könntest du also die Qualität der medizinischen Versorgung verbessern und ein modernes, patientenorientiertes Gesundheitsmanagement fördern. Wie klingt das für dein Projekt?









-->
