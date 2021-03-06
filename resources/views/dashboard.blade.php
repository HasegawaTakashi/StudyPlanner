<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
    <ul>
        <li>
            <a href="{{ route('memo.create') }}">
                <button type="button">メモ新規作成</button>
            </a>
        </li>
        <li>
            <a href="{{ route('memo.list') }}">
                <button type="button">メモ一覧表示</button>
            </a>
        </li>
        <li>
            <a href="{{ route('memo.delete.list') }}">
                <button type="button">削除済みメモ一覧</button>
            </a>
        </li>
    </ul>
</x-app-layout>
