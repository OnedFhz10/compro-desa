@extends('layouts.admin')

@section('title', 'Data Statistik')

@section('content')
    <div class="bg-gray-800 rounded-lg shadow-lg p-6">
        {{-- Header --}}
        <div class="border-b border-gray-700 pb-4 mb-6 flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold text-white">Kelola Statistik Desa</h2>
                <p class="text-sm text-gray-400">Update data statistik kependudukan, pendidikan, pekerjaan, dll.</p>
            </div>
        </div>



            {{-- Tab Navigation --}}
            <div class="mb-6 border-b border-gray-700">
                <nav class="flex space-x-4 overflow-x-auto" role="tablist">
                    <button type="button" class="tab-btn active px-4 py-2 text-sm font-medium rounded-t-lg bg-gray-700 text-white" 
                        data-tab="umum">
                        Umum
                    </button>
                    @foreach ($statistics as $category => $items)
                        <button type="button" class="tab-btn px-4 py-2 text-sm font-medium rounded-t-lg text-gray-400 hover:text-white hover:bg-gray-700" 
                            data-tab="{{ Str::slug($category) }}">
                            {{ ucfirst($category) }}
                        </button>
                    @endforeach
                </nav>
            </div>

            {{-- Tab Contents --}}
            <div class="tab-content-container">
                
                {{-- TAB: UMUM --}}
                <div class="tab-content active" id="umum">
                    <form action="{{ route('admin.statistics.updateGeneral') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="bg-gray-700/30 rounded-lg p-6 border border-gray-700 space-y-6">
                            <h3 class="text-lg font-semibold text-white mb-4">Gambaran Umum Wilayah</h3>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-300">Jumlah Penduduk</label>
                                    <input type="number" name="population" value="{{ old('population', $profile->population ?? '') }}" min="0"
                                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-300">Jumlah Kepala Keluarga (KK)</label>
                                    <input type="number" name="total_families" value="{{ old('total_families', $profile->total_families ?? '') }}" min="0"
                                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-300">Luas Wilayah (km²)</label>
                                    <input type="number" name="area_size" value="{{ old('area_size', $profile->area_size ?? '') }}" min="0" step="0.01"
                                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-300">Jumlah RT</label>
                                    <input type="number" name="rt_count" value="{{ old('rt_count', $profile->rt_count ?? '') }}" min="0"
                                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                                <div>
                                    <label class="block mb-2 text-sm font-medium text-gray-300">Jumlah RW</label>
                                    <input type="number" name="rw_count" value="{{ old('rw_count', $profile->rw_count ?? '') }}" min="0"
                                        class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                </div>
                            </div>

                            <div class="pt-4 border-t border-gray-600">
                                <h4 class="text-md font-semibold text-white mb-3">Batas Wilayah</h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-300">Utara</label>
                                        <input type="text" name="boundary_north" value="{{ old('boundary_north', $profile->boundary_north ?? '') }}"
                                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-300">Selatan</label>
                                        <input type="text" name="boundary_south" value="{{ old('boundary_south', $profile->boundary_south ?? '') }}"
                                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-300">Timur</label>
                                        <input type="text" name="boundary_east" value="{{ old('boundary_east', $profile->boundary_east ?? '') }}"
                                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-300">Barat</label>
                                        <input type="text" name="boundary_west" value="{{ old('boundary_west', $profile->boundary_west ?? '') }}"
                                            class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end pt-4">
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg transition shadow-lg">
                                    Simpan Data Umum
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                {{-- OTHER STATS --}}
                <form action="{{ route('admin.statistics.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    @foreach ($statistics as $category => $items)
                        <div class="tab-content hidden" id="{{ Str::slug($category) }}">
                            <div class="bg-gray-700/30 rounded-lg p-6 border border-gray-700">
                                <h3 class="text-lg font-semibold text-white mb-4">Data {{ ucfirst($category) }}</h3>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                    @foreach ($items as $stat)
                                        <div>
                                            <label class="block mb-2 text-sm font-medium text-gray-300">{{ $stat->name }}</label>
                                            <input type="number" name="stats[{{ $stat->id }}]" value="{{ $stat->value }}" min="0" required
                                                class="bg-gray-700 border border-gray-600 text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="mt-8 pt-6 border-t border-gray-700 flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-6 rounded-lg transition shadow-lg flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                            Simpan Data Statistik
                        </button>
                    </div>
                </form>
            </div>


    </div>

    {{-- Script for Tabs (Reuse logic if possible, or inline) --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-btn');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Deactivate all
                    tabs.forEach(t => {
                        t.classList.remove('active', 'bg-gray-700', 'text-white');
                        t.classList.add('text-gray-400');
                    });
                    contents.forEach(c => c.classList.add('hidden'));

                    // Activate clicked
                    tab.classList.add('active', 'bg-gray-700', 'text-white');
                    tab.classList.remove('text-gray-400');
                    
                    const target = tab.getAttribute('data-tab');
                    document.getElementById(target).classList.remove('hidden');
                });
            });
        });
    </script>
@endsection
