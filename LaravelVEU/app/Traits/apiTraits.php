<?php
    namespace App\Traits;
    use Illuminate\Database\Eloquent\Builder;

    trait apiTraits{
        public function scopeCheckForRelations(Builder $query){
            //$dvar = !empty($this->allowInclude) && request('included');
            //dd($dvar);
            if(!empty($this->allowInclude) && request('included')){
                $relations = explode(',',request('included'));
                $allowInclude = collect($this->allowInclude);
                foreach($relations as $key => $relation){
                    if(!$allowInclude->contains($relation)){
                        unset($relations[$key]);
                    }
                }
                $query->with($relations);
            }
            return;
        }
        public function scopeCheckForSort(Builder $query){
            if(!empty($this->allowSort) && request('sort')){
                $filter = (string) request('sort');
                $allowSort = collect($this->allowSort);
                $order = 'asc';
                if($allowSort->contains($filter)){
                    if(str_starts_with($filter,'-')){
                        $order = 'desc';
                        $filter = $filter->replaceFirst('-','');
                    }
                    $query->orderBy($filter, $order);
                }
            }
            return;
        }
        public function checkForPagination(Builder $query){
            if(request('paginate')){
                
            }
        }
        public function scopeCheckForFilters(Builder $query){
            if(!empty($this->allowFilter) && request('filter')){
                $filters = request('filter');
                $allowFilter = collect($this->allowFilter);
                foreach($filters as $filter => $value){
                    if($allowFilter->contains($filter)){
                        $query -> where($filter, 'LIKE','%'.$value.'%');
                    }
                }
            }
            return;
        }
    }