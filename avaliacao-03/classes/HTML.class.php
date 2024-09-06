<?php
class HTML
{
    private $html;
    private $att;
    private $text;
    private $tipostag;
    private $idtipo;
    private $tagid;
    private $flgend;

    function __construct($tipo = 0, $att = array(), $end = false)
    {
        $this->html = array();
        $this->att = array();
        $this->flgend = array();
        $this->tagid = 1;
        $this->idtipo = 0;

        /* Predefined HTML Tags */
        $this->AddTipotag("HTML");
        $this->AddTipotag("HEAD");
        $this->AddTipotag("TITLE");
        $this->AddTipotag("BODY");
        $this->AddTipotag("TABLE");
        $this->AddTipotag("TR");
        $this->AddTipotag("TD");
        $this->AddTipotag("UL");
        $this->AddTipotag("BR", false);
        $this->AddTipotag("FORM");
        $this->AddTipotag("INPUT", false);
        $this->AddTipotag("SELECT");
        $this->AddTipotag("OPTION");
        $this->AddTipotag("TEXTAREA");
        $this->AddTipotag("IMG", false);
        $this->AddTipotag("DIV");
        $this->AddTipotag("SPAN");
        $this->AddTipotag("BUTTON");
        $this->AddTipotag("SCRIPT");
        $this->AddTipotag("P");

        if ($tipo != 0) {
            $this->AddTag($tipo, $att, $end);
        }
    }

    public function AddTipotag($desctipo, $flgEnd = true)
    {
        $this->idtipo++;
        $this->tipostag[$this->idtipo] = $desctipo;
        $this->tipostag[$desctipo] = $desctipo;
        $this->flgend[$this->idtipo] = $flgEnd;
        $this->flgend[$desctipo] = $flgEnd;
        return $this->idtipo;
    }

    public function AddTag($tipo, $att = array(), $end = false, $text = "")
    {
        $this->StartTag($tipo, $att, $end);
        if ($text != "") {
            $this->AddText($this->tagid, $text);
        }
        if ($end) {
            $this->EndTag($this->tagid);
        }
        return $this->tagid;
    }

    public function StartTag($tipo, $att = array())
    {
        $this->tagid++;
        $this->html[$this->tagid][0] = false;
        if ($this->flgend[$tipo] === false) {
            $this->html[$this->tagid][0] = true;
        }
        $this->html[$this->tagid][1] = $this->tipostag[$tipo];
        $this->html[$this->tagid][2] = 0; // Start
        $this->AddAtt($this->tagid, $att);
        return $this->tagid;
    }

    public function AddAtt($id, $att = array())
    {
        if (!is_array($att)) {
            return false;
        } elseif ($this->html[$id][0] === null or $this->html[$id][1] == null) {
            return false;
        } else {
            foreach ($att as $key => $vlr) {
                $this->att[$id][$key] = $vlr;
            }
        }
    }

    public function AddText($id, $text = "", $clear = false)
    {
        if ($clear) {
            $this->text[$id] = "";
        }
        $this->text[$id] .= $text;
    }

    public function EndTag($id)
    {
        if ($this->html[$id][0] === true) {
            return false;
        } elseif ($this->html[$id][1] != null) {
            $this->html[$id][0] = true;
            $this->StartTag($this->html[$id][1]);
            $this->html[$this->tagid][0] = true;
            $this->html[$this->tagid][2] = 1; // end
            return true;
        } else {
            return false;
        }
    }

    public function toHTML()
    {
        if ($this->tagid == -1) {
            return FALSE;
        } else {
            $htmltext = "";
            foreach ($this->html as $key => $vlr) {
                if ($vlr[0] == FALSE) {
                    $htmltext .= "<p>ERROR in Structure.. Missing closing tag.." . $this->tipostag[$vlr[1]] . " (id #" . $key . ")</p>";
                    return $htmltext;
                }
                if ($vlr[2] == 0) { // Start
                    if ($vlr[1] == "TITLE") {
                        $htmltext .= "<HEAD>\n\t<" . $vlr[1] . ">";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } elseif ($vlr[1] == "BODY") {
                        $htmltext .= "<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">\n";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } elseif ($vlr[1] == "HTML") {
                        $htmltext .= "<" . $vlr[1] . ">\n";
                    } elseif ($vlr[1] == "TABLE") {
                        $htmltext .= "\t<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">\n";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } elseif ($vlr[1] == "TR") {
                        $htmltext .= "\t\t<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">\n";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } elseif ($vlr[1] == "TD") {
                        $htmltext .= "\t\t\t<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } elseif ($vlr[1] == "FORM") {
                        $htmltext .= "\t<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">\n\t";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } elseif ($vlr[1] == "P") {
                        $htmltext .= "\t<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } elseif ($vlr[1] == "INPUT") {
                        $htmltext .= "\t\t<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">\n\t";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } elseif ($vlr[1] == "BUTTON") {
                        $htmltext .= "\t<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    } else {
                        $htmltext .= "<" . $vlr[1];

                        if (is_array($this->att[$key])) {
                            foreach ($this->att[$key] as $att => $vlr) {
                                if ($att == " ") {
                                    $htmltext .= " " . $vlr;
                                } else {
                                    $htmltext .= " " . $att . "=\"" . $vlr . "\"";
                                }
                            }
                        }
                        $htmltext .= ">";
                        if ($this->text[$key] != "") {
                            $htmltext .= $this->text[$key];
                        }
                    }
                }
                if ($vlr[2] == 1) { // End
                    if ($vlr[1] == "TITLE") {
                        $htmltext .= "</" . $vlr[1] . ">\t\n</HEAD>\n";
                    } elseif ($vlr[1] == "TR") {
                        $htmltext .= "\t\t</" . $vlr[1] . ">\t\n";
                    } elseif ($vlr[1] == "TABLE" || $vlr[1] == "TD" || $vlr[1] == "TR" || $vlr[1] == "TD") {
                        $htmltext .= "\t</" . $vlr[1] . ">\t\n";
                    } elseif ($vlr[1] == "FORM") {
                        $htmltext .= "\t</" . $vlr[1] . ">\t\n";
                    } else {
                        if ($this->flgend[$vlr[1]] === true) {
                            $htmltext .= "</" . $vlr[1] . ">";
                        }
                        if ($vlr[1] != "IMG")
                            $htmltext .= "\n";
                    }
                }
            }
            return $htmltext;
        }
        return FALSE;
    }

}