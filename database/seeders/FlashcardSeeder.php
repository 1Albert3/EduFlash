<?php

namespace Database\Seeders;

use App\Models\Flashcard;
use Illuminate\Database\Seeder;

class FlashcardSeeder extends Seeder
{
    public function run(): void
    {
        $flashcards = [
            [
                'category_id' => 1, // Languages
                'title_en' => '100 Essential English Words',
                'title_fr' => '100 Mots Anglais Essentiels',
                'summary_en' => 'Master the most commonly used English words in daily conversation and business.',
                'summary_fr' => 'Maîtrisez les mots anglais les plus utilisés dans la conversation quotidienne et les affaires.',
                'content_en' => '<h3>Top 100 Essential English Words</h3><p>Learn the most important English words for daily communication.</p><ul><li>Be, Have, Do, Say, Get</li><li>Make, Go, Know, Take, See</li><li>Come, Think, Look, Want, Give</li></ul>',
                'content_fr' => '<h3>Top 100 Mots Anglais Essentiels</h3><p>Apprenez les mots anglais les plus importants pour la communication quotidienne.</p><ul><li>Be (être), Have (avoir), Do (faire)</li><li>Make (faire), Go (aller), Know (savoir)</li></ul>',
                'keywords_en' => 'english, vocabulary, words, language learning',
                'keywords_fr' => 'anglais, vocabulaire, mots, apprentissage langue',
                'slug' => '100-essential-english-words',
                'is_featured' => true,
                'is_published' => true
            ],
            [
                'category_id' => 2, // IT
                'title_en' => '20 Keyboard Shortcuts for Windows',
                'title_fr' => '20 Raccourcis Clavier pour Windows',
                'summary_en' => 'Boost your productivity with these essential Windows keyboard shortcuts.',
                'summary_fr' => 'Boostez votre productivité avec ces raccourcis clavier Windows essentiels.',
                'content_en' => '<h3>Essential Windows Shortcuts</h3><ul><li>Ctrl + C - Copy</li><li>Ctrl + V - Paste</li><li>Alt + Tab - Switch apps</li><li>Win + D - Show Desktop</li></ul>',
                'content_fr' => '<h3>Raccourcis Windows Essentiels</h3><ul><li>Ctrl + C - Copier</li><li>Ctrl + V - Coller</li><li>Alt + Tab - Basculer entre applications</li><li>Win + D - Afficher Bureau</li></ul>',
                'keywords_en' => 'windows, shortcuts, keyboard, productivity',
                'keywords_fr' => 'windows, raccourcis, clavier, productivité',
                'slug' => '20-keyboard-shortcuts-windows',
                'is_featured' => true,
                'is_published' => true
            ],
            [
                'category_id' => 5, // Productivity
                'title_en' => 'Pomodoro Technique in 5 Minutes',
                'title_fr' => 'Technique Pomodoro en 5 Minutes',
                'summary_en' => 'Learn the famous time management technique that boosts focus and productivity.',
                'summary_fr' => 'Apprenez la célèbre technique de gestion du temps qui améliore la concentration.',
                'content_en' => '<h3>The Pomodoro Technique</h3><p>A time management method using 25-minute focused work intervals.</p><ol><li>Choose a task</li><li>Set timer for 25 minutes</li><li>Work until timer rings</li><li>Take a 5-minute break</li></ol>',
                'content_fr' => '<h3>La Technique Pomodoro</h3><p>Une méthode de gestion du temps utilisant des intervalles de travail focalisé de 25 minutes.</p><ol><li>Choisir une tâche</li><li>Régler le minuteur sur 25 minutes</li><li>Travailler jusqu\'à la sonnerie</li><li>Prendre une pause de 5 minutes</li></ol>',
                'keywords_en' => 'pomodoro, productivity, time management, focus',
                'keywords_fr' => 'pomodoro, productivité, gestion temps, concentration',
                'slug' => 'pomodoro-technique-5-minutes',
                'is_featured' => false,
                'is_published' => true
            ]
        ];

        foreach ($flashcards as $flashcard) {
            Flashcard::create($flashcard);
        }
    }
}
