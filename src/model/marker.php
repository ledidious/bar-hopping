<?php

// todo dummy class, please implement with real data
class marker {

    private $_sId = null;

    public function getSId() {
        if ($this->_sId === null) {
            $this->_sId = rand(0, 1000);
        }
        return $this->_sId;
    }
}
