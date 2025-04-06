<?php
session_start();

// State data with your provided information
$states = [
    'Odisha' => [
        'dropout_rates' => [
            'primary' => 0.0,
            'upper_primary' => 0.2,
            'secondary' => 27.3,
            'secondary_high' => 49.9,
            'secondary_govt' => 27.0
        ],
        'causes' => [
            ['name' => 'Economic Constraints', 'percentage' => 35],
            ['name' => 'Domestic Responsibilities', 'percentage' => 25],
            ['name' => 'Lack of Interest', 'percentage' => 20],
            ['name' => 'Distance to School', 'percentage' => 15],
            ['name' => 'Safety Concerns', 'percentage' => 5]
        ],
        'strategies' => [
            'Financial Assistance',
            'Community Engagement',
            'Curriculum Enhancement',
            'Infrastructure Development',
            'Safety Measures'
        ],
        'image' => '/img/odishamap.png'
    ],
    'Bihar' => [
        'dropout_rates' => [
            'primary' => 8.9,
            'upper_primary' => 25.0,
            'secondary' => 25.0,
            'girls_secondary' => 40.3,
            'boys_secondary' => 38.8
        ],
        'causes' => [
            ['name' => 'Economic Constraints', 'percentage' => 40],
            ['name' => 'Gender Inequality', 'percentage' => 25],
            ['name' => 'Child Marriage', 'percentage' => 15],
            ['name' => 'Infrastructure Deficiencies', 'percentage' => 15],
            ['name' => 'Cultural Expectations', 'percentage' => 5]
        ],
        'strategies' => [
            'Financial Support',
            'Community Awareness',
            'Infrastructure Enhancement',
            'Policy Interventions',
            'Vocational Training'
        ],
        'image' => '/img/bihar.png'
    ],
    'Assam' => [
        'dropout_rates' => [
            'lower_primary' => 8.49,
            'upper_primary' => 10.33,
            'secondary' => 20.25,
            'south_salmara' => 32.39,
            'sivasagar' => 4.03
        ],
        'causes' => [
            ['name' => 'Economic Constraints', 'percentage' => 30],
            ['name' => 'Gender Inequality', 'percentage' => 25],
            ['name' => 'Infrastructure Gaps', 'percentage' => 20],
            ['name' => 'Transportation', 'percentage' => 15],
            ['name' => 'Lack of Interest', 'percentage' => 10]
        ],
        'strategies' => [
            'Financial Support',
            'Community Awareness',
            'School Infrastructure',
            'Transport Facilities',
            'Curriculum Revitalization'
        ],
        'image' => '/img/assam.png'
    ],
    'Gujarat' => [
        'dropout_rates' => [
            'primary' => 1.0,
            'upper_primary' => 4.5,
            'secondary' => 17.9,
            'boys_15_16' => 9.4,
            'girls_15_16' => 10.5,
            'chhota_udaipur' => 82.91
        ],
        'causes' => [
            ['name' => 'Economic Constraints', 'percentage' => 35],
            ['name' => 'Gender Disparities', 'percentage' => 25],
            ['name' => 'Quality of Education', 'percentage' => 20],
            ['name' => 'Infrastructure', 'percentage' => 15],
            ['name' => 'Social Factors', 'percentage' => 5]
        ],
        'strategies' => [
            'Financial Assistance',
            'Community Engagement',
            'Curriculum Enhancement',
            'Infrastructure Development',
            'Girls Education Programs'
        ],
        'image' => '/img/guju.png'
    ],
    'Karnataka' => [
        'dropout_rates' => [
            'primary' => 1.7,
            'upper_primary' => 2.7,
            'secondary' => 22.09,
            'out_of_school' => 9326,
            'bangalore_south' => 2028
        ],
        'causes' => [
            ['name' => 'Migration', 'percentage' => 30],
            ['name' => 'Economic Constraints', 'percentage' => 25],
            ['name' => 'Gender Disparities', 'percentage' => 20],
            ['name' => 'Quality of Education', 'percentage' => 15],
            ['name' => 'Infrastructure', 'percentage' => 10]
        ],
        'strategies' => [
            'Financial Assistance',
            'Community Engagement',
            'Curriculum Enhancement',
            'Infrastructure Development',
            'Migration Support'
        ],
        'image' => '/img/karna.png'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Dropout Analysis | 5 Key States</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    sans: ['Space Grotesk', 'sans-serif'],
                },
                extend: {
                    colors: {
                        'primary': '#08141B',
                        'secondary': '#11212D',
                        'tertiary': '#233745',
                        'accent': '#4A5C6A',
                        'light': '#9BAAAB',
                        'lighter': '#CCD0CF',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-8px)' },
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .state-card {
            transition: all 0.3s ease;
            background-size: cover;
            background-position: center;
            height: 200px;
            position: relative;
            overflow: hidden;
            border-radius: 12px;
        }
        .state-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to top, rgba(24, 54, 71, 0.9), rgba(29, 64, 83, 0.5));
        }
        .state-card .content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem;
            transform: translateY(100px);
            transition: transform 0.3s ease;
        }
        .state-card:hover .content {
            transform: translateY(0);
        }
        .state-card h3 {
            transition: all 0.3s ease;
        }
        .state-card:hover h3 {
            margin-bottom: 0.5rem;
        }
        .states-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }
        .state-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.8);
            z-index: 1000;
            overflow-y: auto;
            padding: 2rem;
        }
        .modal-content {
            background: white;
            border-radius: 12px;
            max-width: 1200px;
            margin: 2rem auto;
            animation: fadeIn 0.3s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .close-modal {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: white;
            cursor: pointer;
        }
        /* Key Statistics Section Styles */
        .stats-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .stats-title {
            font-weight: 600;
            color: #11212D;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            border-bottom: 2px solid #4A5C6A;
            padding-bottom: 0.75rem;
        }
        .chart-container {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            height: 100%;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .findings-container {
            background: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .hero-bg {
            background-image: linear-gradient(rgba(8, 20, 27, 0.8), rgba(8, 20, 27, 0.8)), 
                              url('https://images.unsplash.com/flagged/photo-1574097656146-0b43b7660cb6?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-lighter font-sans">
    <!-- Navigation -->
    <nav class="bg-primary text-white shadow-lg">
        <div class="container mx-auto px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <i class="fas fa-graduation-cap text-2xl text-accent mr-2"></i>
                    <span class="font-semibold text-xl">State Dropout Analysis</span>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-light hover:text-white">Home</a>
                    <a href="#" class="text-light hover:text-white">State Data</a>
                    <a href="#" class="text-light hover:text-white">National Trends</a>
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <a href="dashboard.php" class="bg-accent hover:bg-tertiary px-4 py-2 rounded">Dashboard</a>
                    <?php else: ?>
                        <a href="login.php" class="bg-accent hover:bg-tertiary px-4 py-2 rounded">Login</a>
                    <?php endif; ?>
                </div>
                <button class="md:hidden text-white focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold text-center text-primary mb-4">State-Wise Dropout Analysis</h1>
        <p class="text-xl text-center text-secondary mb-12">Exploring dropout rates in 5 key Indian states</p>
        
        <!-- State Cards Grid -->
        <div class="states-grid mb-16">
            <?php 
            // Reorder states to show Odisha, Gujarat, Karnataka first
            $orderedStates = [
                'Odisha' => $states['Odisha'],
                'Gujarat' => $states['Gujarat'],
                'Karnataka' => $states['Karnataka'],
                'Bihar' => $states['Bihar'],
                'Assam' => $states['Assam']
            ];
            
            foreach ($orderedStates as $state => $data): ?>
                <div class="state-card w-80 cursor-pointer" 
                     style="background-image: url('<?= $data['image'] ?>')"
                     onclick="openStateModal('<?= strtolower($state) ?>')">
                    <div class="content text-white">
                        <h3 class="text-2xl font-bold mb-8"><?= $state ?></h3>
                        <div class="opacity-0 transition-opacity duration-300 state-card:hover:opacity-100">
                            <p class="mb-2"><strong>Secondary Dropout:</strong> <?= $data['dropout_rates']['secondary'] ?>%</p>
                            <p class="mb-4"><?= $state == 'Odisha' ? 'Highest in India' : ($state == 'Assam' ? 'Exceeds national average' : 'Significant challenge') ?></p>
                            <button class="inline-block bg-accent hover:bg-tertiary text-white font-medium py-2 px-4 rounded">
                                View Details
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- State Modals -->
        <?php foreach ($states as $state => $data): ?>
            <div id="<?= strtolower($state) ?>-modal" class="state-modal">
                <span class="close-modal" onclick="closeModal('<?= strtolower($state) ?>-modal')">&times;</span>
                
                <div class="modal-content">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <!-- State Header -->
                        <div class="bg-secondary text-white p-8">
                            <div class="flex flex-col md:flex-row items-center">
                                <div class="md:w-1/3 mb-6 md:mb-0">
                                    <div class="h-48 w-full rounded-lg overflow-hidden shadow-md">
                                        <img src="<?= $data['image'] ?>" alt="<?= $state ?>" class="h-full w-full object-cover">
                                    </div>
                                </div>
                                <div class="md:w-2/3 md:pl-8">
                                    <h2 class="text-3xl font-bold mb-2"><?= $state ?> Dropout Analysis</h2>
                                    <p class="text-light mb-6">Comprehensive data and insights about student dropout trends in <?= $state ?></p>
                                    
                                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                        <div class="bg-tertiary p-3 rounded-lg">
                                            <div class="text-xl font-bold">
                                                <?= $data['dropout_rates']['primary'] ?? $data['dropout_rates']['lower_primary'] ?? 'N/A' ?>%
                                            </div>
                                            <div class="text-xs text-light">Primary</div>
                                        </div>
                                        <div class="bg-tertiary p-3 rounded-lg">
                                            <div class="text-xl font-bold">
                                                <?= $data['dropout_rates']['upper_primary'] ?>%
                                            </div>
                                            <div class="text-xs text-light">Upper Primary</div>
                                        </div>
                                        <div class="bg-tertiary p-3 rounded-lg">
                                            <div class="text-xl font-bold">
                                                <?= $data['dropout_rates']['secondary'] ?>%
                                            </div>
                                            <div class="text-xs text-light">Secondary</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Content -->
                        <div class="p-8">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                                <!-- Causes Section -->
                                <div>
                                    <h3 class="text-2xl font-bold text-primary mb-6">Primary Causes</h3>
                                    <div class="h-64">
                                        <canvas id="<?= strtolower($state) ?>CausesChart"></canvas>
                                    </div>
                                    <div class="mt-6 space-y-4">
                                        <?php foreach ($data['causes'] as $cause): ?>
                                            <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-accent">
                                                <h4 class="font-semibold text-secondary mb-1">
                                                    <?= $cause['name'] ?> (<?= $cause['percentage'] ?>%)
                                                </h4>
                                                <p class="text-gray-700">
                                                    <?php 
                                                        switch($cause['name']) {
                                                            case 'Economic Constraints':
                                                                echo 'Financial hardships compel students to leave school and support families.';
                                                                break;
                                                            case 'Domestic Responsibilities':
                                                                echo 'Household duties, especially for girls, take precedence over education.';
                                                                break;
                                                            case 'Gender Inequality':
                                                                echo 'Societal norms prioritize boys\' education over girls\'.';
                                                                break;
                                                            case 'Distance to School':
                                                                echo 'Long distances and inadequate transportation deter attendance.';
                                                                break;
                                                            case 'Migration':
                                                                echo 'Families moving for work disrupts children\'s education.';
                                                                break;
                                                            default:
                                                                echo 'Significant contributor to dropout rates in this state.';
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <!-- Solutions Section -->
                                <div>
                                    <h3 class="text-2xl font-bold text-primary mb-6">Prevention Strategies</h3>
                                    <div class="h-64">
                                        <canvas id="<?= strtolower($state) ?>StrategiesChart"></canvas>
                                    </div>
                                    <div class="mt-6 space-y-4">
                                        <?php foreach ($data['strategies'] as $strategy): ?>
                                            <div class="p-4 bg-gray-50 rounded-lg">
                                                <h4 class="font-semibold text-secondary mb-1 flex items-center">
                                                    <i class="fas fa-check-circle text-accent mr-2"></i>
                                                    <?= $strategy ?>
                                                </h4>
                                                <p class="text-gray-700">
                                                    <?php 
                                                        switch($strategy) {
                                                            case 'Financial Assistance':
                                                                echo 'Scholarships and aid to alleviate economic burdens on families.';
                                                                break;
                                                            case 'Community Engagement':
                                                                echo 'Awareness campaigns about education importance, especially for girls.';
                                                                break;
                                                            case 'Curriculum Enhancement':
                                                                echo 'Making education more engaging and relevant to students\' lives.';
                                                                break;
                                                            case 'Infrastructure Development':
                                                                echo 'Improving school facilities and accessibility.';
                                                                break;
                                                            case 'Safety Measures':
                                                                echo 'Policies ensuring student safety, particularly for girls.';
                                                                break;
                                                            default:
                                                                echo 'Targeted intervention to address specific dropout factors.';
                                                        }
                                                    ?>
                                                </p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Key Statistics - UPDATED SECTION -->
                            <div class="stats-section">
                                <h3 class="stats-title">Key Statistics</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="chart-container">
                                        <canvas id="<?= strtolower($state) ?>TrendsChart"></canvas>
                                    </div>
                                    <div class="findings-container">
                                        <h4 class="text-xl font-semibold text-secondary mb-4">Notable Findings</h4>
                                        <ul class="space-y-3 text-gray-700">
                                            <?php if($state == 'Odisha'): ?>
                                                <li class="flex items-start">
                                                    <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-2"></i>
                                                    <span>Highest secondary dropout rate in India at <?= $data['dropout_rates']['secondary'] ?>% (govt data) or <?= $data['dropout_rates']['secondary_high'] ?>% (other reports)</span>
                                                </li>
                                            <?php elseif($state == 'Bihar'): ?>
                                                <li class="flex items-start">
                                                    <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-2"></i>
                                                    <span>Upper primary dropout rate of <?= $data['dropout_rates']['upper_primary'] ?>%, far exceeding national average</span>
                                                </li>
                                            <?php elseif($state == 'Assam'): ?>
                                                <li class="flex items-start">
                                                    <i class="fas fa-arrow-up text-red-500 mt-1 mr-2"></i>
                                                    <span>Increasing dropout rates across all levels (<?= $data['dropout_rates']['lower_primary'] ?>% to <?= $data['dropout_rates']['secondary'] ?>%)</span>
                                                </li>
                                            <?php elseif($state == 'Gujarat'): ?>
                                                <li class="flex items-start">
                                                    <i class="fas fa-female text-purple-500 mt-1 mr-2"></i>
                                                    <span>Chhota Udaipur district has <?= $data['dropout_rates']['chhota_udaipur'] ?>% girl dropout rate</span>
                                                </li>
                                            <?php elseif($state == 'Karnataka'): ?>
                                                <li class="flex items-start">
                                                    <i class="fas fa-chart-line text-red-500 mt-1 mr-2"></i>
                                                    <span>Secondary dropout rate increased from 14.9% to <?= $data['dropout_rates']['secondary'] ?>% in one year</span>
                                                </li>
                                            <?php endif; ?>
                                            <li class="flex items-start">
                                                <i class="fas fa-venus-mars text-blue-500 mt-1 mr-2"></i>
                                                <span>
                                                    <?php if(isset($data['dropout_rates']['girls_secondary'])): ?>
                                                        Girls complete secondary at <?= $data['dropout_rates']['girls_secondary'] ?>% vs boys at <?= $data['dropout_rates']['boys_secondary'] ?>%
                                                    <?php else: ?>
                                                        Significant gender disparities in education completion
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Footer -->
    <footer class="bg-secondary text-white py-8">
        <div class="container mx-auto px-6 text-center">
            <p class="text-light">© <?= date('Y') ?> Student Dropout Analysis System. All rights reserved.</p>
        </div>
    </footer>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Initialize all charts
        document.addEventListener('DOMContentLoaded', function() {
            <?php foreach ($states as $state => $data): ?>
                // Causes Chart
                new Chart(
                    document.getElementById('<?= strtolower($state) ?>CausesChart').getContext('2d'),
                    {
                        type: 'doughnut',
                        data: {
                            labels: <?= json_encode(array_column($data['causes'], 'name')) ?>,
                            datasets: [{
                                data: <?= json_encode(array_column($data['causes'], 'percentage')) ?>,
                                backgroundColor: [
                                    '#08141B', '#11212D', '#233745', '#4A5C6A', '#9BAAAB'
                                ],
                                borderWidth: 0
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Primary Causes of Dropouts',
                                    font: {
                                        size: 16,
                                        family: 'Space Grotesk',
                                        weight: '600'
                                    },
                                    padding: {
                                        top: 10,
                                        bottom: 20
                                    }
                                },
                                legend: { 
                                    position: 'right',
                                    labels: {
                                        font: {
                                            family: 'Space Grotesk'
                                        }
                                    }
                                }
                            }
                        }
                    }
                );

                // Strategies Chart
                new Chart(
                    document.getElementById('<?= strtolower($state) ?>StrategiesChart').getContext('2d'),
                    {
                        type: 'bar',
                        data: {
                            labels: <?= json_encode($data['strategies']) ?>,
                            datasets: [{
                                label: 'Impact Potential',
                                data: [30, 25, 20, 15, 10],
                                backgroundColor: [
                                    'rgba(8, 20, 27, 0.7)',
                                    'rgba(17, 33, 45, 0.7)',
                                    'rgba(35, 55, 69, 0.7)',
                                    'rgba(74, 92, 106, 0.7)',
                                    'rgba(155, 170, 171, 0.7)'
                                ],
                                borderColor: [
                                    '#08141B', '#11212D', '#233745', '#4A5C6A', '#9BAAAB'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Strategy Impact Potential',
                                    font: {
                                        size: 16,
                                        family: 'Space Grotesk',
                                        weight: '600'
                                    },
                                    padding: {
                                        top: 10,
                                        bottom: 20
                                    }
                                },
                                legend: { display: false }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: { 
                                        display: true, 
                                        text: 'Impact Score',
                                        font: {
                                            family: 'Space Grotesk',
                                            weight: '600'
                                        }
                                    },
                                    ticks: {
                                        font: {
                                            family: 'Space Grotesk'
                                        }
                                    }
                                },
                                x: {
                                    ticks: {
                                        font: {
                                            family: 'Space Grotesk'
                                        }
                                    }
                                }
                            }
                        }
                    }
                );

                // Trends Chart
                new Chart(
                    document.getElementById('<?= strtolower($state) ?>TrendsChart').getContext('2d'),
                    {
                        type: 'line',
                        data: {
                            labels: ['Primary', 'Upper Primary', 'Secondary'],
                            datasets: [{
                                label: 'Dropout Rate %',
                                data: [
                                    <?= $data['dropout_rates']['primary'] ?? $data['dropout_rates']['lower_primary'] ?? 0 ?>,
                                    <?= $data['dropout_rates']['upper_primary'] ?? 0 ?>,
                                    <?= $data['dropout_rates']['secondary'] ?? 0 ?>
                                ],
                                borderColor: '#4A5C6A',
                                backgroundColor: 'rgba(74, 92, 106, 0.1)',
                                tension: 0.3,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Dropout Rates by Education Level',
                                    font: {
                                        size: 16,
                                        family: 'Space Grotesk',
                                        weight: '600'
                                    },
                                    padding: {
                                        top: 10,
                                        bottom: 20
                                    }
                                },
                                legend: {
                                    labels: {
                                        font: {
                                            family: 'Space Grotesk'
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: { 
                                        display: true, 
                                        text: 'Dropout Rate %',
                                        font: {
                                            family: 'Space Grotesk',
                                            weight: '600'
                                        }
                                    },
                                    ticks: {
                                        font: {
                                            family: 'Space Grotesk'
                                        }
                                    }
                                },
                                x: {
                                    ticks: {
                                        font: {
                                            family: 'Space Grotesk'
                                        }
                                    }
                                }
                            }
                        }
                    }
                );
            <?php endforeach; ?>
        });
        
        // Modal functions
        function openStateModal(stateId) {
            document.getElementById(stateId + '-modal').style.display = 'block';
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        
        // Close modal when clicking outside content
        window.onclick = function(event) {
            document.querySelectorAll('.state-modal').forEach(modal => {
                if (event.target == modal) {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            });
        }
    </script>
</body>
</html>