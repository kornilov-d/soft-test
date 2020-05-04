function protect(def){
    def= def.replace(/<\/?[^>]+>/g,'');
    return def;
}