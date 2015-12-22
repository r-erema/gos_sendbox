<?php

namespace Observer;

interface Observer {

    public function update(Observable $observable);

}