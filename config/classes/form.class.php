<?php 
/**
 * class Form
 * 
 * Classe de création d'un formulaire
 */

class Form {

    // validation form 
    private $errors = [];
    private $post   = [];
    private $name; 
    private $value;
    private $label; 

    // formulaire HTML 
    private $action;
    private $method; 
    private $htmlForm; 

    public function __construct( $post = [], $action = '', $method = 'post' ) {

        $this->action = $action;
        $this->method = $method;
        $this->post   = $post;

        $this->htmlForm = '<form method="'.$this->method.'" action="'.$this->action.'">';

    }

    // affichage des values apres validation du formulaire 
    public function getPostValue($name) {

        return (isset($this->post[$name])) ? $this->post[$name] : '';
    }

    public function input($type, $name, $label, $values = '') {

        // j'instancie le name de mon champ input à ma propriété name 
        $this->name = $name;
        $this->label = $label;

        // je récupere la valeur du champ par son nom 
        $this->value = $this->getPostValue($name);

        switch ($type) {
            case 'text':
                $this->setText($name, $label);
                break;
            case 'textarea':
                $this->setTextarea($name, $label);
                break;
            case 'password': 
                $this->setPassword($name, $label);
                break;
            case 'select': 
                $this->setSelect($name, $label, $values);
                break;
            case 'radio': 
                $this->setRadio($name, $label, $values);
                break;
            case 'checkbox': 
                $this->setCheckbox($name, $label, $values);
                break;
            case 'file': 
                $this->setFile($name, $label);
                break;
        }

        return $this;
    }

    // set d'un champ input text
    public function setText($name, $label) {
       
        $this->htmlForm .= '<div class="form-group row">'.
                            '<label class="col-sm-2 col-form-label" for="d">'.$label.'</label>'.
                            '<div class="col-sm-10"><input type="text" class="form-control" placeholder="'.$label.'" name="'.$name.'" value="'.$this->getPostValue($name).'"></div>'.
                        '</div>';
    }

    // set d'un champ input password
    public function setPassword($name, $label) {

        $this->htmlForm .= '<div class="form-group row">'.
                            '<label class="col-sm-2 col-form-label" for="d">'.$label.'</label>'.
                            '<div class="col-sm-10"><input type="password" class="form-control" placeholder="'.$label.'" name="'.$name.'" value="'.$this->getPostValue($name).'"></div>'.
                        '</div>';
    }

    // set d'un champ input password
    public function setTextarea($name, $label) {

        $this->htmlForm .= '<div class="form-group row">'.
                            '<label class="col-sm-2 col-form-label" for="d">'.$label.'</label>'.
                            '<div class="col-sm-10"><textarea class="form-control" name="'.$name.'" cols="40" rows="3" >'.$this->getPostValue($name).'</textarea></div>'.
                        '</div>';
    }

    // set d'un champ input 
    public function setSelect($name, $label, $values) {

        $this->htmlForm .= '<div class="form-group row">'.
                            '<label class="col-sm-2 col-form-label" for="d">'.$label.'</label>'.
                            '<div class="col-sm-10">'.
                                '<select class="form-control" name="'.$name.'" >';

                                foreach ($values as $key => $value) {

                                    if ($this->getPostValue($name) == $key) {
                                        $this->htmlForm .= '<option value="'.$key.'" selected>'.$value.'</option>';
                                    }
                                    else {
                                        $this->htmlForm .= '<option value="'.$key.'">'.$value.'</option>';
                                    }
                                }

        $this->htmlForm .= '</select></div></div>';
    }

    // set d'un champ input  radio
    public function setRadio($name, $label, $values) {

        $this->htmlForm .= '<fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">'.$label.'</legend>
                                <div class="col-sm-10">';
                                $i = 1;
                                foreach ($values as $key => $value) {

                                    if ($this->getPostValue($name) == $key) {
                                        $this->htmlForm .= '<div class="form-check">
                                                                <input class="form-check-input" type="radio" name="'.$name.'" id="'.$name.'_'.$i.'" value="'.$key.'" checked>
                                                                <label class="form-check-label" for="'.$name.'_'.$i.'">
                                                                    '.$value.'
                                                                </label>
                                                            </div>';
                                    }
                                    else {
                                        $this->htmlForm .= '<div class="form-check">
                                                                <input class="form-check-input" type="radio" name="'.$name.'" id="'.$name.'_'.$i.'" value="'.$key.'" >
                                                                <label class="form-check-label" for="'.$name.'_'.$i.'">
                                                                    '.$value.'
                                                                </label>
                                                            </div>';
                                    }
                                    $i++;
                                }

        $this->htmlForm .= '</div>
                            </div>
                        </fieldset>';
    }

    // set d'un champ input checkbox
    public function setCheckbox($name, $label, $values) {

        $this->htmlForm .= '<fieldset class="form-group">
                                <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">'.$label.'</legend>
                                <div class="col-sm-10">';
                                $i = 1;
                                foreach ($values as $key => $value) {

                                    if ($this->getPostValue($name) == $key) {
                                        $this->htmlForm .= '<div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="'.$name.'[]" id="'.$name.'_'.$i.'" value="'.$key.'" checked>
                                                                <label class="form-check-label" for="'.$name.'_'.$i.'">
                                                                    '.$value.'
                                                                </label>
                                                            </div>';
                                    }
                                    else {
                                        $this->htmlForm .= '<div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="'.$name.'[]" id="'.$name.'_'.$i.'" value="'.$key.'" >
                                                                <label class="form-check-label" for="'.$name.'_'.$i.'">
                                                                    '.$value.'
                                                                </label>
                                                            </div>';
                                    }
                                    $i++;
                                }

        $this->htmlForm .= '</div>
                            </div>
                        </fieldset>';
    }


    // set d'un champ input text
    public function setFile($name, $label) {
       
        $this->htmlForm .= '<div class="form-group row">'.
                                '<label class="col-sm-2 col-form-label" for="d">'.$label.'</label>'.
                                '<div class="col-sm-10">
                                    <div class="custom-file">
                                        <input type="file"  name="'.$name.'" class="custom-file-input" id="'.$name.'">
                                        <label class="custom-file-label" for="'.$name.'">Selectionner un fichier...</label>
                                    </div>
                                </div>'.
                            '</div>';
    }

    // set submit button 
    public function submit($value) {
        $this->htmlForm .= '<div><button type="submit" class="btn btn-primary mb-2">'.$value.'</button></div>';
    }

    // affichage du rendu HTML du formulaire
    public function getForm() {
        return $this->htmlForm.'</form>';
    }

    /**
     * Champ obligatoire 
     * 
     * @return this
     */
    public function required(){

        if(($this->value == '' || $this->value == null)){
            $this->errors[$this->name] = 'Le champ '.$this->label.' est obligatoire.';
        }

        return $this;
        
    }

    /**
     * vérification pour savoir si les champs sont valides 
     * 
     * @return boolean
     */
    public function valid() {

        if(empty($this->errors)) {
            return $this->post;
        }

        return false; 
    }
    
    /**
     * Récupération des erreurs 
     * 
     * @return array $this->errors
     */
    public function getErrors(){

        if(!$this->valid()) {
            return $this->errors;
        }
    }

    /**
     * Visualisation des erreurs au format Html
     * 
     * @return string $html
     */
    public function displayErrors(){

        if (!empty($this->post)) {
            // je recupere mes erreurs 
            $errorList = $this->getErrors();
            $i = 1;


            // je boucle sur mes erreurs pour les afficher 
            $html = '<div class="alert alert-danger" role="alert">';
            foreach ($errorList as $error) {
                $i++;
                $html .= $error;
                $html .= (count($errorList) < $i ) ? '': '<hr class="m-1">';
            }
            $html .= '</div>';

            return $html;
        }
        else {
            return false;
        }
        
    }

    /**
     * Longeur de champ minimale 
     * 
     */
    public function min($length){
        
        
        if ( strlen($this->value) < $length ) {
            // le champ est inferieur à $length 
            $this->errors[] = 'Le champ '.$this->name.' est inferieur à '.$length.' caractères.';
        }


        return $this;

    }
        
    /**
     * Longeur de champs Maximale 
     * 
     */
    public function max($length){
        
        if ( strlen($this->value) > $length ) {
            // le champ est su à $length 
            $this->errors[] = 'Le champ '.$this->name.' est superieur à '.$length.' caractères.';
        }

        return $this;

    }
    
    /**
     *  Verifie si la valeur est un e-mail valide 
     *
     */
    public function is_email(){
        if(!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Le champ '.$this->name.' est invalide';
        }

        return $this;
    }
        
    /**
     * Verifie si la valeur est de type int 
     *
     */
    public function is_int(){
        
        if(!filter_var($this->value, FILTER_VALIDATE_INT)) {
            $this->errors[] = 'Le champ '.$this->name.' est invalide, il doit être un nombre entier.';
        }

        return $this;
        
    }
    
    /**
     * Verifie si la valeur est de type float 
     *
     */
    public function is_float(){
        if(!filter_var($this->value, FILTER_VALIDATE_FLOAT)) {
            $this->errors[] = 'Le champ '.$this->name.' est invalide, il doit être un décimal.';
        }

        return $this;
    }
    
    /**
     *  Verifie si la valeur est une URL valide
     *
     */
    public function is_url(){
        if(!filter_var($this->value, FILTER_VALIDATE_URL)) {
            $this->errors[] = 'Le champ '.$this->name.' est invalide';
        }

        return $this;
    }
    
    /**
     *  Verifie si le champ est egal a la valeur indiquée en prarametre 
     *
     */
    public function equal($value){
    
        if($this->value != $value){
            $this->errors[$this->name] = 'Le champ '.$this->name.' ne correspond pas.';
        }
        return $this;
        
    }
    
}


