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
public class ChamadaAtendida implements Serializable {
    private static final long serialVersionUID = 1L;
    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private Long id;

    @Temporal(javax.persistence.TemporalType.DATE)
    private Date dataAtendimento;

    private Integer parametroA;

    private Integer parametroB;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Date getDataAtendimento() {
        return dataAtendimento;
    }

    public void setDataAtendimento(Date dataAtendimento) {
        this.dataAtendimento = dataAtendimento;
    }

    public Integer getParametroA() {
        return parametroA;
    }

    public void setParametroA(Integer parametroA) {
        this.parametroA = parametroA;
    }

    public Integer getParametroB() {
        return parametroB;
    }

    public void setParametroB(Integer parametroB) {
        this.parametroB = parametroB;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (id != null ? id.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof ChamadaAtendida)) {
            return false;
        }
        ChamadaAtendida other = (ChamadaAtendida) object;
        if ((this.id == null && other.id != null) || (this.id != null && !this.id.equals(other.id))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "fakecorp.ChamadaRecebida[id=" + id + "]";
    }

}
