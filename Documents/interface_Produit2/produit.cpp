#include "produit.h"
#include <QSqlQuery>
#include <QDebug>
#include <QObject>
Produit::Produit()
{
id= 0 ;
categorie="" ;
prix=0 ;
qtt_dispo=0 ;
}
Produit::Produit(int id, int qtt_dispo , double prix,QString categorie)

{
    this->id=id ;
    this->qtt_dispo=qtt_dispo;
    this->categorie=categorie;
    this->prix=prix;

}
int Produit::getid()
{
    return id ;
}
QString Produit::getcategorie()
{
    return categorie ;
}
int Produit::getqtt_dispo()
{
    return qtt_dispo;
}
double Produit::getprix()
{
    return prix;
}

void Produit::setid(int id)
{ this->id=id; }
void Produit::setcategorie(QString categorie)
{this->categorie=categorie; }
void Produit::setqtt_dispo(int qtt_dispo){this->qtt_dispo=qtt_dispo ; }
void Produit::setprix(double prix)
{this->prix=prix ; }

bool Produit::ajouter()
{

    QString id_string = QString::number(id) ;
    QSqlQuery query;
          query.prepare("INSERT INTO PRODUIT (id, qtt_dispo , prix, categorie) "
                        "VALUES (:id, :qtt_dispo, :prix, :categorie )");
          query.bindValue(":id",  id_string);
          query.bindValue(":qtt_dispo",qtt_dispo);
          query.bindValue(":prix", prix );
          query.bindValue(":categorie", categorie);

    return query.exec() ;
}

bool Produit::supprimer(int id)
{
    QSqlQuery query ;
    QString res=QString::number(id) ;
    query.prepare("Delete from produit where ID= :id");
    query.bindValue(":id", res) ;
    return query.exec();
}

QSqlQueryModel* Produit::afficher()
{
    QSqlQueryModel* model=new QSqlQueryModel();
          model->setQuery("SELECT * FROM produit ");

          model->setHeaderData(0, Qt::Horizontal, QObject::tr("ID"));
          model->setHeaderData(1, Qt::Horizontal,  QObject::tr("QTT_DISPO"));
             model->setHeaderData(2, Qt::Horizontal,  QObject::tr("PRIX"));
                model->setHeaderData(3, Qt::Horizontal,  QObject::tr("CATEGORIE"));
    return model ;
}
QSqlQueryModel * Produit::trie_ID()
{
    QSqlQueryModel * model= new QSqlQueryModel();

          model->setQuery("SELECT * FROM PRODUIT ORDER BY cin");
          model->setHeaderData(0,Qt::Horizontal,QObject::tr("ID"));
          model->setHeaderData(1,Qt::Horizontal,QObject::tr("nom"));
          model->setHeaderData(2,Qt::Horizontal,QObject::tr("prenom"));
          model->setHeaderData(3,Qt::Horizontal,QObject::tr("adresse"));
          model->setHeaderData(4,Qt::Horizontal,QObject::tr("date_naissance"));


    return model;
}
/*QSqlQueryModel * voyageur::afficher()
{

    QSqlQueryModel * model=new QSqlQueryModel();

    model->setQuery("SELECT* FROM VOYAGEURS");
    model->setHeaderData(0,Qt::Horizontal,QObject::tr("cin"));
    model->setHeaderData(1,Qt::Horizontal,QObject::tr("nom"));
    model->setHeaderData(2,Qt::Horizontal,QObject::tr("prenom"));
     model->setHeaderData(3,Qt::Horizontal,QObject::tr("adresse"));
     model->setHeaderData(3,Qt::Horizontal,QObject::tr("date_naissance"));

     return model;
}*/

bool Produit::modifier()
{
    QSqlQuery query;
       //QString res=QString::number(id);

        query.prepare("UPDATE PRODUIT SET  ID=:id ,PRIX=:prix  WHERE ID=:id");
QString id_string = QString::number(id) ;
        query.bindValue(":id",id_string);
        query.bindValue(":prix",prix);


    return query.exec();
}
