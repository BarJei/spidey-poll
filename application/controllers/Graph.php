<?php

ob_start();

include_once APPPATH.'/views/jpgraph/jpgraph.php';
include_once APPPATH.'/views/jpgraph/jpgraph_bar.php';

class Graph extends CI_Controller{

    public function __construct() {
        parent::__construct();
    }

    public function makeGraph(){

        $datay = array(5, 15, 10);
        $datax = array("Yes!", "Yeah!", "Pogi!");

        $graph = new Graph(550,200);
        $graph->setScale("textlin");

        $graph->Set90AndMargin(50,20,50,30);

        $graph->title->Set("Pogi ba si Tongki?");
        $graph->title->SetFont(FF_VERDANA,FS_BOLD,12);

//        $graph->xaxis->SetLabelMargin(5);
        $graph->xaxis->SetTickLabels($datax);
        $plot = new BarPlot($datay);
//        $plot->SetFillColor("red");

        $graph->Add($plot);
        unlink("assets/img/bar.jpg");

        $graph->Stroke("assets/img/bar.jpg");

        $this->load->view("v_graph");
    }

    public function makeGraphPro(){

        $datay = array(13, 25, 7, 3);
        $datax = array('Poe','Duterte','Roxas','Binay');

// Size of graph
        $width = 1022;
        $height = 322;

// Set the basic parameters of the graph
        $graph = new Graph($width,$height,'auto');
        $graph->SetScale('textlin');

// Rotate graph 90 degrees and set margin
        $graph->Set90AndMargin(50,20,50,30);

// Nice shadow
        $graph->SetShadow();

// Setup title
        $graph->title->Set('Who do you prefer for President?');
        $graph->title->SetFont(FF_VERDANA,FS_BOLD,14);

// Setup X-axis
        $graph->xaxis->SetTickLabels($datax);
        $graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,12);

// Some extra margin looks nicer
//        $graph->xaxis->SetLabelMargin(5);

// Label align for X-axis
//        $graph->xaxis->SetLabelAlign('center', 'bottom');
        $graph->yaxis->SetLabelAlign('center', 'bottom');

// Add some grace to y-axis so the bars doesn't go
// all the way to the end of the plot area
//        $graph->yaxis->scale->SetGrace(20);

// We don't want to display Y-axis
//        $graph->yaxis->Hide();

// Now create a bar pot
        $bplot = new BarPlot($datay);
//        $bplot->SetFillColor("blue");
        $bplot->SetShadow();

//You can change the width of the bars if you like
//$bplot->SetWidth(0.5);

// We want to display the value of each bar at the top
        $bplot->value->Show();
        $bplot->value->SetFont(FF_ARIAL,FS_BOLD,12);
        $bplot->value->SetAlign('left','center');
        $bplot->value->SetColor('black','darkred');
        $bplot->value->SetFormat('%.1f mkr');

// Add the bar to the graph
        $graph->Add($bplot);

        unlink("assets/img/barJei.jpg");

        $graph->Stroke("assets/img/barJei.jpg");

        $this->load->view("v_graph");
    }

}
