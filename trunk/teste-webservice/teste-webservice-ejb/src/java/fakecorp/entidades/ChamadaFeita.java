/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

package fakecorp.entidades;

import java.io.Serializable;
import java.util.Date;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.Temporal;

/**
 *
 * @author jorge
 */
@Entity
public class ChamadaFeita implements Serializable {
    private static final long serialVersionUID = 1L;

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;

    @Temporal(javax.persistence.TemporalType.DATE)
    private Date dataRequisicao;

    private Integer resposta;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Date getDataRequisicao() {
        return dataRequisicao;
    }

    public void setDataRequisicao(Date dataRequisicao) {
        this.dataRequisicao = dataRequisicao;
    }

    public Integer getResposta() {
        return resposta;
    }

    public void setResposta(Integer resposta) {
        this.resposta = resposta;
    }
   

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }



}
