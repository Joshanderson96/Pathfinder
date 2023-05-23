<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Pathfinder extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'pathfinder';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Get grid
        $grid = $this->getGrid();
        // Start point
        $startPoint = [0, 2];
        // end point
        $endPoint = [2, 3];

        $this->findShortestPath($grid, $startPoint, $endPoint);

        // print_r($grid);
    }

    public function getGrid() 
    {
        
        $grid = [];

        for ($height = 0; $height < 5; $height++) {
            $grid[] = ['.', '.', '.', '.', '.'];
        }

        // set wall
        $grid[1][1] = '#';
        $grid[1][2] = '#';
        $grid[1][3] = '#';

        return $grid;
    }

    private function findShortestPath($grid, $p, $q) 
    {
        // Set start and end point on grid
        $grid[$p[0]][$p[1]] = 'p';
        $grid[$q[0]][$q[1]] = 'q';

        $count = 0;

        $path = [];


        while ($p != $q) 
        {
                       
            while ($p[0] != $q[0]) {
                $p[0]++;
                $path[] = $p;
            }

            while ($p[1] != $q[1]) {
                $p[1]++;
                $path[] = $p;
            }

        }   

        foreach ($path as $row) {
            if ($grid[$row[0]][$row[1]] === '.') {
                $count++;
            } elseif ($grid[$row[0]][$row[1]] === '#') {
                return 0;
            }

            print_r($count);
        }

        

    }





}
