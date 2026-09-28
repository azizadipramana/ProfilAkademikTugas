@props([
    'type' => 'info',
    'title' => null,
    'message' => null,
    'dismissible' => true,
])

@php
    $typeConfig = match($type) {
        'success' => [
            'bg' => 'bg-emerald-50 dark:bg-emerald-950/60',
            'border' => 'border-emerald-300 dark:border-emerald-800',
            'text' => 'text-emerald-900 dark:text-emerald-200',
            'iconBg' => 'bg-emerald-100 dark:bg-emerald-900/60 text-emerald-600 dark:text-emerald-400',
            'icon' => 'success'
        ],
        'warning' => [
            'bg' => 'bg-amber-50 dark:bg-amber-950/60',
            'border' => 'border-amber-300 dark:border-amber-800',
            'text' => 'text-amber-900 dark:text-amber-200',
            'iconBg' => 'bg-amber-100 dark:bg-amber-900/60 text-amber-600 dark:text-amber-400',
            'icon' => 'warning'
        ],
        'danger' => [
            'bg' => 'bg-rose-50 dark:bg-rose-950/60',
            'border' => 'border-rose-300 dark:border-rose-800',
            'text' => 'text-rose-900 dark:text-rose-200',
            'iconBg' => 'bg-rose-100 dark:bg-rose-900/60 text-rose-600 dark:text-rose-400',
            'icon' => 'danger'
        ],
        default => [
            'bg' => 'bg-blue-50 dark:bg-blue-950/60',
            'border' => 'border-blue-300 dark:border-blue-800',
            'text' => 'text-blue-900 dark:text-blue-200',
            'iconBg' => 'bg-blue-100 dark:bg-blue-900/60 text-blue-600 dark:text-blue-400',
            'icon' => 'info'
        ],
    };
@endphp

<div id="status-banner-{{ md5($title . $message . rand(1, 10000)) }}" 
     {{ $attributes->merge(['class' => "rounded-xl border p-4 shadow-sm transition-all duration-300 {$typeConfig['bg']} {$typeConfig['border']} {$typeConfig['text']}"]) }}
     role="alert">
    <div class="flex items-start gap-3">
        <div class="w-9 h-9 rounded-lg flex items-center justify-center shrink-0 {{ $typeConfig['iconBg'] }}">
            @if($typeConfig['icon'] === 'success')
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @elseif($typeConfig['icon'] === 'warning')
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            @elseif($typeConfig['icon'] === 'danger')
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @else
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            @endif
        </div>

        <div class="flex-1 min-w-0">
            @if($title)
                <h4 class="font-semibold text-sm sm:text-base leading-snug">
                    {{ $title }}
                </h4>
            @endif

            @if($message)
                <p class="text-xs sm:text-sm mt-0.5 opacity-90 leading-relaxed">
                    {{ $message }}
                </p>
            @endif

            @if($slot->isNotEmpty())
                <div class="mt-2 text-xs sm:text-sm">
                    {{ $slot }}
                </div>
            @endif
        </div>

        @if($dismissible)
            <button type="button" 
                    onclick="this.closest('[role=alert]').style.display='none'"
                    class="p-1 rounded-lg hover:bg-black/5 dark:hover:bg-white/10 opacity-70 hover:opacity-100 transition-opacity"
                    aria-label="Tutup notifikasi">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
    </div>
</div>
