<?php

class Game
{
    private $position;

    public function  __construct($squares)
    {
        $this->position = str_split($squares);
    }

    public function getPosition(){
        return $this->position;
    }

    public function winner($token)
    {
        for($row = 0; $row < 3; $row++){
            $result = true;
            for($col = 0; $col < 3; $col++){
                if($this->position[3 * $row + $col] != $token)
                    $result = false;
            }
            if ($result)
                return $result;
        }

        for($col = 0; $col < 3; $col++){
            $result = true;
            for($row = 0; $row < 3; $row++){
                if($this->position[3 * $row + $col] != $token)
                    $result = false;
            }
            if ($result)
                return $result;
        }

        $result = true;
        for($row = 0; $row < 3; $row++){
            $col = $row;
            if($this->position[3 * $row + $col] != $token)
                $result = false;
        }
        if ($result)
            return $result;

        $result = true;
        for($row = 0; $row < 3; $row++){
            $col = 2 - $row;
            if($this->position[3 * $row + $col] != $token)
                $result = false;
        }
        if ($result)
            return $result;

       return $result;
    }

    function ai(){
        for ($count = 0; $count < sizeof($this->position); $count++) {
            if($this->position[$count] == '-') {
                $this->position[$count] = 'x';
                return;
            }
        }
    }

    function display()
    {
        echo '<table col="3" style="width:100%; font-size: large; font-weight: bold">';
        echo '<tr>'; // open the first row
        for ($pos=0; $pos<9; $pos++) {
            echo $this->show_cell($pos);
            if ($pos % 3 == 2)
                echo '</tr><tr>';// start a new row for the next 
        }
        echo '</tr>'; // close the last row
        echo '</table>';
        echo '<a href = "./index.php">Game Reset </a>';
    }
    function show_cell($which){
        $token = $this->position[$which];
        if ($token <> '-') return '<td>' . $token . '</td>';
        $this->newposition = $this->position;
        $this->newposition[$which] = 'o';
        $move = implode($this->newposition);
        $link = '/?board=' . $move;
        return '<td><a href = "./index.php' . $link . '">-</a></td>';
    }
}

